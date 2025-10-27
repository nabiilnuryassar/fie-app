<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;

class MediaStreamController
{
    /**
     * Stream a file with support for HTTP Range requests (partial content).
     * URL example: /media/stream/public/path%2Fto%2Ffile.mp3
     */
    public function stream(Request $request, $disk, $encodedPath)
    {
        // decode the path which was rawurlencoded in the URL
        $path = urldecode($encodedPath);

        if (!Storage::disk($disk)->exists($path)) {
            abort(404);
        }

        $fullPath = Storage::disk($disk)->path($path);
        $size = filesize($fullPath);
        $mime = mime_content_type($fullPath) ?: 'application/octet-stream';

        $start = 0;
        $end = $size - 1;
        $status = 200;

        // Handle HTTP Range header for partial requests
        if ($request->headers->has('range')) {
            $range = $request->header('range'); // e.g. bytes=0-499
            if (preg_match('/bytes=(\d+)-(\d*)/', $range, $matches)) {
                $start = intval($matches[1]);
                if ($matches[2] !== '') {
                    $end = intval($matches[2]);
                }
                if ($end > $size - 1) {
                    $end = $size - 1;
                }
                $status = 206; // Partial Content
            }
        }

        $length = $end - $start + 1;

        $response = new StreamedResponse(function () use ($fullPath, $start, $length) {
            $buffer = 8192;
            $handle = fopen($fullPath, 'rb');
            if ($start > 0) {
                fseek($handle, $start);
            }
            $bytesRemaining = $length;
            while ($bytesRemaining > 0 && !feof($handle)) {
                $read = min($buffer, $bytesRemaining);
                echo fread($handle, $read);
                flush();
                $bytesRemaining -= $read;
            }
            fclose($handle);
        }, $status);

        $response->headers->set('Content-Type', $mime);
        $response->headers->set('Content-Length', (string) $length);
        $response->headers->set('Accept-Ranges', 'bytes');
        if ($status === 206) {
            $response->headers->set('Content-Range', sprintf('bytes %d-%d/%d', $start, $end, $size));
        }

        return $response;
    }
}

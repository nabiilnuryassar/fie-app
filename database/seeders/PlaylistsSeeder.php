<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaylistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $playlists = [
            [
                'title' => 'Life Goes On',
                'description' => 'A soft reminder that even after the darkest storm, life goes on. And I\'ll be right here with you as it does.',
                'image' => 'image_placeholder_1.jpg',
                'thumbnail' => 'thumb_placeholder_1.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'You And Me',
                'description' => 'Because in a world full of chaos, anxiety, and noise, the only thing that feels real and truly matters is \'you and me\'.',
                'image' => 'image_placeholder_2.jpg',
                'thumbnail' => 'thumb_placeholder_2.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'My Immortal',
                'description' => 'Because I know you\'re haunted by memories and trauma. I want you to know that you never have to face those ghosts alone. I\'ll sit in the dark with you.',
                'image' => 'image_placeholder_3.jpg',
                'thumbnail' => 'thumb_placeholder_3.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'All I Wanted',
                'description' => 'This is my voice for the days you pull away or feel lost. No matter how distant you feel, \'all I ever wanted was you\'.',
                'image' => 'image_placeholder_4.jpg',
                'thumbnail' => 'thumb_placeholder_4.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'The Only Exception',
                'description' => 'Because I know your past has given you every reason to build walls. I\'m here to prove that I am your exception. I\'m staying.',
                'image' => 'image_placeholder_5.jpg',
                'thumbnail' => 'thumb_placeholder_5.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Still into You',
                'description' => 'Because I\'ve seen you on your best days and your worst, and my heart still skips a beat. I am so, so still into you.',
                'image' => 'image_placeholder_6.jpg',
                'thumbnail' => 'thumb_placeholder_6.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'With Me',
                'description' => 'Because all I want in this world is for you to find your sanctuary and your safest space \'with me\'.',
                'image' => 'image_placeholder_7.jpg',
                'thumbnail' => 'thumb_placeholder_7.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'I\'d Do Anything',
                'description' => 'A reminder that there is truly nothing I wouldn\'t do to reach you, to fight for you, and to be with you. Anything.',
                'image' => 'image_placeholder_8.jpg',
                'thumbnail' => 'thumb_placeholder_8.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Every Breath You Take',
                'description' => 'I\'m reframing this song: \'Every breath you take,\' every move you make, I am here watching over you, making sure you are safe.',
                'image' => 'image_placeholder_9.jpg',
                'thumbnail' => 'thumb_placeholder_9.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'She Will Be Loved - Radio Mix',
                'description' => 'A promise for the days you feel broken and unworthy. You *will* be loved. I will personally make sure of it.',
                'image' => 'image_placeholder_10.jpg',
                'thumbnail' => 'thumb_placeholder_10.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'The Reason',
                'description' => 'Because you have become \'the reason\' I strive to be a better man and a safer space for your heart every single day.',
                'image' => 'image_placeholder_11.jpg',
                'thumbnail' => 'thumb_placeholder_11.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Chasing Cars',
                'description' => 'An invitation to forget this complicated world, even for just a moment. Let\'s just lay here, you and me. That\'s all I need.',
                'image' => 'image_placeholder_12.jpg',
                'thumbnail' => 'thumb_placeholder_12.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Lonely Day',
                'description' => 'Because I know you have these \'lonely days\'. This song is here to validate them. And I am so, so glad you survive every single one.',
                'image' => 'image_placeholder_13.jpg',
                'thumbnail' => 'thumb_placeholder_13.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'I Don\'t Want To Miss A Thing - From "Armageddon" Soundtrack',
                'description' => 'This is how I feel about our LDR. Every text, every call, every virtual moment with you is a moment I treasure. I truly don\'t want to miss a thing.',
                'image' => 'image_placeholder_14.jpg',
                'thumbnail' => 'thumb_placeholder_14.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Making Love Out of Nothing at All',
                'description' => 'To answer your biggest fear. I know how to do a lot of things, but \'leaving you\' is the one thing I\'ll never know how to do.',
                'image' => 'image_placeholder_15.jpg',
                'thumbnail' => 'thumb_placeholder_15.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Without You',
                'description' => 'This is my raw, honest answer for the days you ask if it\'s \'okay to give up\'. No. Because I \'can\'t live, if living is without you\'.',
                'image' => 'image_placeholder_16.jpg',
                'thumbnail' => 'thumb_placeholder_16.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Thank You For Loving Me',
                'description' => 'This song is for you. For being my dream and my strength. Thank you for showing me what true courage looks like, and thank you for letting me love you.',
                'image' => 'image_placeholder_17.jpg',
                'thumbnail' => 'thumb_placeholder_17.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Always',
                'description' => 'This isn\'t just a song, it\'s my most important promise to you, written in one word: \'Always\'.',
                'image' => 'image_placeholder_18.jpg',
                'thumbnail' => 'thumb_placeholder_18.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'You\'re the Inspiration - 2006 Remaster',
                'description' => 'For the days you feel worthless, please listen to this and remember: \'You\'re the inspiration\' for this entire website, and for so much of my life.',
                'image' => 'image_placeholder_19.jpg',
                'thumbnail' => 'thumb_placeholder_19.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Amin Paling Serius',
                'description' => 'Because you are the beautiful \'storm\' and I will be your \'calm\'. This song is my prayer for us. This is my \'most serious amen\'.',
                'image' => 'image_placeholder_20.jpg',
                'thumbnail' => 'thumb_placeholder_20.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'title' => 'Timur',
                'description' => 'Because you are my \'East\'—the place where my sun rises, my new beginning, and my greatest hope, even on the darkest days.',
                'image' => 'image_placeholder_21.jpg',
                'thumbnail' => 'thumb_placeholder_21.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        // Insert data into the 'playlists' table
        DB::table('playlists')->insert($playlists);
    }
}

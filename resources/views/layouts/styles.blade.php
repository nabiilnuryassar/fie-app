<style>
    /* Custom styles for pixel theme */
    body {
        font-family: 'VT323', monospace;
        background-color: #FEF9F8;
        color: #2c2c2c;
    }

    .pixel-border {
        border: 4px solid #2c2c2c;
    }

    .pixel-shadow {
        box-shadow: 6px 6px 0px #2c2c2c;
        transition: all 0.1s ease-in-out;
    }

    .pixel-shadow-sm {
        box-shadow: 4px 4px 0px #2c2c2c;
    }

    .pixel-button:hover {
        transform: translate(2px, 2px);
        box-shadow: 4px 4px 0px #2c2c2c;
    }

    .pixel-button:active {
        transform: translate(6px, 6px);
        box-shadow: none;
    }

    .pixelated {
        image-rendering: pixelated;
    }

    .nav-link {
        transition: color 0.2s;
    }

    .nav-link:hover {
        color: #D94545;
    }
</style>

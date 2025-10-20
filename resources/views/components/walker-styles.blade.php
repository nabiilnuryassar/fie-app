<style>
    /* Walker container and lanes */
    .about-runway {
        position: relative;
        /* wrapper context if needed by lanes */
        pointer-events: none;
    }

    .about-runway .lane {
        position: relative;
        width: 100%;
        height: auto;
    }

    /* Walker image */
    .about-runway .walker {
        height: 100px;
        aspect-ratio: 1 / 1;
        position: fixed;
        bottom: 64px;
        /* just above bottom bar */
        image-rendering: -moz-crisp-edges;
        image-rendering: crisp-edges;
        object-fit: contain;
        will-change: transform;
        z-index: 9999;
    }

    /* Horizontal travel with mid-point flip */
    @keyframes sway-250px-flip {
        0% {
            transform: translateX(0) scaleX(-1);
        }

        /* face right */
        49.999% {
            transform: translateX(250px) scaleX(-1);
        }

        50% {
            transform: translateX(250px) scaleX(1);
        }

        /* face left */
        100% {
            transform: translateX(0) scaleX(1);
        }
    }

    .about-runway .lane.top .walk-ltr {
        animation: sway-250px-flip 20s linear infinite;
    }
</style>

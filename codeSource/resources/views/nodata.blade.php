<style>
    body {
        color: #7f8897;
        font-family: Lato, sans-serif;
        font-size: 14px;
        font-weight: 300;
        letter-spacing: 0.05em;
        line-height: 1.5em;
        /*background: #f7f7f7;*/
        text-align: center;
    }

    .wrap-noresult {
        margin: 50px auto 0;
        width: 120px;
        height: 100px;
        position: relative;
    }

    h2 {
        font-size: 16px;
        font-weight: 400;
        text-transform: uppercase;
        margin-top: 3em;
    }

    div.items {
        font-size: 50px;
    }

    div.items .fa {
        position: absolute;
        top: calc(50% - 0.4em);
        left: calc(50% - 0.4em);
        opacity: 0;
    }

    div.items .fa:nth-child(1) {
        animation: slidefade 20s 0s infinite linear;
    }

    div.items .fa:nth-child(2) {
        animation: slidefade 20s 2s infinite linear;
    }

    div.items .fa:nth-child(3) {
        animation: slidefade 20s 4s infinite linear;
    }

    div.items .fa:nth-child(4) {
        animation: slidefade 20s 6s infinite linear;
    }

    div.items .fa:nth-child(5) {
        animation: slidefade 20s 8s infinite linear;
    }

    div.items .fa:nth-child(6) {
        animation: slidefade 20s 10s infinite linear;
    }

    div.items .fa:nth-child(7) {
        animation: slidefade 20s 12s infinite linear;
    }

    div.items .fa:nth-child(8) {
        animation: slidefade 20s 14s infinite linear;
    }

    div.items .fa:nth-child(9) {
        animation: slidefade 20s 16s infinite linear;
    }

    div.items .fa:nth-child(10) {
        animation: slidefade 20s 18s infinite linear;
    }


    i.fa-search {
        color: #a9afb9;
        position: absolute;
        z-index: 2;
    }

    i.search-1 {
        font-size: 20px;
        top: 5px;
        left: 0;
        top: -10px;
        left: -15px;
        animation: rotcw 5s infinite linear;
    }

    i.search-2 {
        font-size: 12px;
        top: 10px;
        right: 15px;
        top: -5px;
        right: 0;
        animation: rotcw 4s infinite linear;
    }

    i.search-3 {
        font-size: 12px;
        bottom: 0;
        left: 5px;
        bottom: -15px;
        left: -10px;
        animation: rotccw 4.4s infinite linear;
    }

    i.search-4 {
        font-size: 20px;
        bottom: -5px;
        right: 0;
        bottom: -20px;
        right: -15px;
        animation: rotccw 5.5s infinite linear;
    }


    /**
 * Animations
 */

    @keyframes slidefade {
        0% {
            opacity: 0;
            transform: translate(50px, 0);
        }

        4.5% {
            opacity: 1;
            transform: translate(10px, 0);
        }

        10.5% {
            opacity: 1;
            transform: translate(-10px, 0);
        }

        15% {
            opacity: 0;
            transform: translate(-50px, 0);
        }

        100% {
            opacity: 0;
            transform: translate(50px, 0);
        }
    }

    @keyframes rotcw {
        from {
            transform: rotate(0deg) translate(5px) rotate(0deg);
        }

        to {
            transform: rotate(360deg) translate(5px) rotate(-360deg);
        }
    }

    @keyframes rotccw {
        from {
            transform: rotate(0deg) translate(5px) rotate(0deg);
        }

        to {
            transform: rotate(-360deg) translate(5px) rotate(360deg);
        }
    }
</style>

<div class="wrap-noresult">
    <i class="fa fa-search search-1"></i>
    <i class="fa fa-search search-2"></i>
    <i class="fa fa-search search-3"></i>
    <i class="fa fa-search search-4"></i>
    <div class="items">
        <i class="fa fa-file-o"></i>
        <i class="fa fa-file-archive-o"></i>
        <i class="fa fa-file-audio-o"></i>
        <i class="fa fa-file-code-o"></i>
        <i class="fa fa-file-excel-o"></i>
        <i class="fa fa-file-image-o"></i>
        <i class="fa fa-file-pdf-o"></i>
        <i class="fa fa-file-powerpoint-o"></i>
        <i class="fa fa-file-video-o"></i>
        <i class="fa fa-file-word-o"></i>
    </div>
</div>
<h2>No results</h2>
<p><em>We searched far and wide and couldn't <br />find anyone matching your search.</em></p>

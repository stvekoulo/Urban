<!-- App css -->
<link href="{{ asset('admin/assets/css/style.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('admin/assets/js/config.js') }}"></script>

<style>
    .dot {
        height: 10px;
        width: 10px;
        background-color: green;
        border-radius: 50%;
        display: inline-block;
    }

    .red {
        background-color: red;
    }

    .green {
        background-color: green;
    }

    .blink {
        animation: blink-animation 1s steps(5, start) infinite;
    }

    @keyframes blink-animation {
        to {
            visibility: hidden;
        }
    }
</style>

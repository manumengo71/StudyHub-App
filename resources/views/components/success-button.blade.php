<button
    {{ $attributes->merge(['type' => 'submit', 'class' => ' px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 focus:bg-green-700 active:bg-green-900 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 button2 ' . $class ?? '']) }}>
    {{ $slot }}
</button>

<style>
    .button2 {
        display: inline-block;
        transition: all 0.2s ease-in;
        position: relative;
        overflow: hidden;
        z-index: 1;
        color: #090909;
        padding: 0.7em 1.7em;
        cursor: pointer;
        border-radius: 0.5em;
        background: #2f855a;
        border: 1px solid #e8e8e8;
        box-shadow: 6px 6px 12px #c5c5c5, -6px -6px 12px #ffffff;
    }

    .button2:active {
        color: #666;
        box-shadow: inset 4px 4px 12px #c5c5c5, inset -4px -4px 12px #ffffff;
    }

    .button2:before {
        content: "";
        position: absolute;
        left: 50%;
        transform: translateX(-50%) scaleY(1) scaleX(1.25);
        top: 100%;
        width: 140%;
        height: 180%;
        background-color: rgba(0, 0, 0, 0.05);
        border-radius: 50%;
        display: block;
        transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
        z-index: -1;
    }

    .button2:after {
        content: "";
        position: absolute;
        left: 55%;
        transform: translateX(-50%) scaleY(1) scaleX(1.45);
        top: 180%;
        width: 160%;
        height: 190%;
        background-color: #2f855a;
        border-radius: 50%;
        display: block;
        transition: all 0.5s 0.1s cubic-bezier(0.55, 0, 0.1, 1);
        z-index: -1;
    }

    .button2:hover {
        color: #ffffff;
        border: 1px solid #2f855a;
    }

    .button2:hover:before {
        top: -35%;
        background-color: #2f855a;
        transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
    }

    .button2:hover:after {
        top: -45%;
        background-color: #009087;
        transform: translateX(-50%) scaleY(1.3) scaleX(0.8);
    }
</style>

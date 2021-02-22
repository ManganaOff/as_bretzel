<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<style>

    body {
        background: #333;
    }

    .svg-item {
        width: 69%;
        font-size: 16px;
        margin: 0 auto;
        animation: donutfade 1s;
    }

    @keyframes donutfade {
    /* this applies to the whole svg item wrapper */
        0% {
            opacity: .2;
        }
        69% {
            opacity: 1;
        }
    }

    @media (min-width: 992px) {
        .svg-item {
            width: 80%;
        }
    }

    .donut-ring {
        stroke: #EBEBEB;
    }

    .donut-segment {
        transform-origin: center;
        stroke: #FF6200;
    }

    .donut-segment-2 {
        stroke: aqua;
        animation: donut1 3s;
    }

    .donut-segment-3 {
        stroke: #d9e021;
        animation: donut2 3s;
    }

    .donut-segment-4 {
        stroke: #ed1e79;
        animation: donut3 3s;
    }

    .segment-1{fill:#ccc;}
    .segment-2{fill:aqua;}
    .segment-3{fill:#d9e021;}
    .segment-4{fill:#ed1e79;}

    .donut-percent {
        animation: donutfadelong 1s;
    }

    @keyframes donutfadelong {
        0% {
            opacity: 0;
        }
        69% {
            opacity: 1;
        }
    }

    @keyframes donut1 {
        0% {
            stroke-dasharray: 0, <?php echo "100" ?>;
        }
        100% {
            stroke-dasharray: <?php echo "69" ?>, 31;
        }
    }

    @keyframes donut2 {
        0% {
            stroke-dasharray: 0, 100;
        }
        70% {
            stroke-dasharray: 30, 70;
        }
    }

    @keyframes donut3{
        0% {
            stroke-dasharray: 0, 100;
        }
        69% {
            stroke-dasharray: 1, 99;
        }
    }

    .donut-text {
        font-family: Arial, Helvetica, sans-serif;
        fill: #FF6200;
    }
    .donut-text-1 {
        fill: aqua;
    }
    .donut-text-2 {
        fill: #d9e021;
    }
    .donut-text-3 {
        fill: #ed1e79;
    }

    .donut-label {
        font-size: 0.28em;
        font-weight: 700;
        line-height: 1;
        fill: #000;
        transform: translateY(0.25em);
    }

    .donut-percent {
        font-size: 0.5em;
        line-height: 1;
        transform: translateY(0.5em);
        font-weight: bold;
    }

    .donut-data {
        font-size: 0.12em;
        line-height: 1;
        transform: translateY(0.5em);
        text-align: center;
        text-anchor: middle;
        color:#666;
        fill: #666;
        animation: donutfadelong 1s;
    }




    /* ---------- */
    /* just for this presentation */
    html { text-align:center; }
    .svg-item {
    max-width:30%;
    display:inline-block;
    }

</style>


<div class="svg-item">
  <svg width="69%" height="69%" viewBox="0 0 40 40" class="donut">
    <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
    <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
    <circle class="donut-segment donut-segment-2" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="<?php echo "69" ?> 31" stroke-dashoffset="25"></circle>
    <g class="donut-text donut-text-1">

      <text y="50%" transform="translate(0, 2)">
        <tspan x="50%" text-anchor="middle" class="donut-percent">69%</tspan>   
      </text>
      <text y="60%" transform="translate(0, 2)">
        <tspan x="50%" text-anchor="middle" class="donut-data">3450 widgets</tspan>   
      </text>
    </g>
  </svg>
</div>
<div class="svg-item">
  <svg width="69%" height="69%" viewBox="0 0 40 40" class="donut">
    <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
    <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
    <circle class="donut-segment donut-segment-3" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="30 70" stroke-dashoffset="25"></circle>
    <g class="donut-text donut-text-2">

      <text y="50%" transform="translate(0, 2)">
        <tspan x="50%" text-anchor="middle" class="donut-percent">30%</tspan>   
      </text>
      <text y="60%" transform="translate(0, 2)">
        <tspan x="50%" text-anchor="middle" class="donut-data">1500 widgets</tspan>   
      </text>
    </g>
  </svg>
</div>

<div class="svg-item">
  <svg width="69%" height="69%" viewBox="0 0 40 40" class="donut">
    <circle class="donut-hole" cx="20" cy="20" r="15.91549430918954" fill="#fff"></circle>
    <circle class="donut-ring" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5"></circle>
    <circle class="donut-segment donut-segment-4" cx="20" cy="20" r="15.91549430918954" fill="transparent" stroke-width="3.5" stroke-dasharray="1 99" stroke-dashoffset="25"></circle>
    <g class="donut-text donut-text-3">

      <text y="50%" transform="translate(0, 2)">
        <tspan x="50%" text-anchor="middle" class="donut-percent">1%</tspan>   
      </text>
      <text y="60%" transform="translate(0, 2)">
        <tspan x="50%" text-anchor="middle" class="donut-data">50 widgets</tspan>   
      </text>
    </g>
  </svg>
</div>


</body>
</html>
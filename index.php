<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tailwind.css">
    <title>Beranda</title>
    <style>
        .index-group {
            display: flex;
            background-color: rgb(255, 255, 255);
        }

        .index-group-posize {
            position: relative;
            min-height: 750px;
            flex-grow: 1;
            margin: 0px;
        }

        .index-flexbox {
            display: flex;
        }

        .index-flexbox-posize2 {
            position: relative;
            flex-grow: 1;
            margin: 92px 30px 66px 46px;
        }

        .index-flexbox-item {
            display: flex;
            flex: 0 1 680px;
        }

        .index-flexbox1 {
            display: flex;
            flex-direction: column;
        }

        .index-flexbox1-posize {
            position: relative;
            flex-grow: 1;
            margin: 0px 0px 1px;
        }

        .index-group1 {
            display: flex;
        }

        .index-group1-posize {
            position: relative;
            min-height: 514px;
            margin: 0px 23px 56px 0px;
        }

        .index-rect {
            background-color: rgb(235, 79, 146);
        }

        .index-rect-posize {
            position: absolute;
            top: 0px;
            height: 41px;
            left: 0px;
            flex-grow: 1;
            right: 457px;
            margin: 45px 0px 428px;
        }

        .index-rect1 {
            background-color: rgb(237, 80, 148);
        }

        .index-rect1-posize {
            position: absolute;
            top: 0px;
            height: 41px;
            left: 382px;
            flex-grow: 1;
            right: 75px;
            margin: 432px 0px 41px;
        }

        .index-img {
            background: var(--src) center center / cover no-repeat;
        }

        .index-img-posize {
            position: relative;
            height: 491px;
            flex-grow: 1;
            margin: 0px 126px 23px 56px;
        }

        .index-rect2 {
            background-color: rgb(255, 108, 108);
        }

        .index-rect2-posize {
            position: absolute;
            top: 0px;
            height: 41px;
            left: 457px;
            flex-grow: 1;
            right: 0px;
            margin: 185px 0px 288px;
        }

        .index-rect3 {
            background-color: rgb(255, 108, 108);
        }

        .index-rect3-posize {
            position: absolute;
            top: 0px;
            height: 41px;
            left: 21px;
            flex-grow: 1;
            right: 436px;
            margin: 473px 0px 0px;
        }

        .index-flexbox1-item {
            display: flex;
            flex: 0 1 21px;
        }

        .index-flexbox-posize {
            position: relative;
            flex-grow: 1;
            margin: 0px 0px 0px 432px;
        }

        .index-flexbox2-item {
            display: flex;
            flex: 0 0 auto;
            min-width: 52px;
        }

        .index-txt {
            display: flex;
            justify-content: center;
            font: 18px/1.2 "Product Sans", Helvetica, Arial, serif;
            color: rgb(117, 115, 127);
            text-align: center;
            letter-spacing: 0;
        }

        .index-txt-posize {
            position: relative;
            width: fit-content;
            margin: 0px auto;
        }

        .index-flexbox2-space {
            display: flex;
            flex: 0 0 auto;
            min-width: 26.5px;
        }

        .index-flexbox2-item1 {
            display: flex;
            flex: 0 0 auto;
            min-width: 170px;
        }

        .index-flexbox-space {
            display: flex;
            flex: 0 0 auto;
            min-width: 16.5px;
        }

        .index-flexbox-item1 {
            display: flex;
            flex: 0 1 587.5px;
        }

        .index-flexbox3 {
            display: flex;
            flex-direction: column;
        }

        .index-flexbox3-posize {
            position: relative;
            flex-grow: 1;
            margin: 7px 0px 0px;
        }

        .index-icon {
            background: var(--src) center center / contain no-repeat;
        }

        .index-icon-posize {
            position: relative;
            height: 116px;
            width: 116px;
            min-width: 116px;
            margin: 0px 446px 23px 26px;
        }

        .index-flexbox3-item {
            display: flex;
            flex: 0 0 auto;
            min-height: 265px;
        }

        .index-txt2 {
            font: 700 72px/1.2 "Axis", Helvetica, Arial, serif;
            color: rgb(0, 0, 0);
            letter-spacing: 0;
            margin: 0px;
        }

        .index-txt2-posize {
            position: relative;
            flex-grow: 1;
            margin: 0px 0px 7px 26px;
        }

        .index-flexbox3-item1 {
            display: flex;
            flex: 0 1 160px;
        }

        .index-flexbox-posize1 {
            position: relative;
            flex-grow: 1;
            margin: 0px 123px 104px 30px;
        }

        .index-flexbox4-item {
            display: flex;
            flex: 0 1 203px;
        }

        .index-coverGroup {
            display: flex;
            background-color: rgb(200, 50, 118);
            border-radius: 28px 28px 28px 28px;
        }

        .index-coverGroup-posize {
            position: relative;
            min-height: 56px;
            flex-grow: 1;
            margin: 0px;
        }

        .index-txt3 {
            display: flex;
            justify-content: center;
            font: 700 24px/1.2 "Axis", Helvetica, Arial, serif;
            color: rgb(255, 255, 255);
            text-align: center;
            letter-spacing: 0;
        }

        .index-txt3-posize {
            position: relative;
            width: fit-content;
            margin: 17px auto 11px;
        }

        .index-flexbox4-space {
            display: flex;
            flex: 0 0 auto;
            min-width: 29px;
        }

        .index-coverGroup1 {
            display: flex;
        }

        .index-coverGroup1-posize {
            position: relative;
            min-height: 56px;
            flex-grow: 1;
            margin: 0px;
        }

        .index-background {
            background-color: rgb(255, 255, 255);
            border: 3px solid rgb(200, 50, 118);
            border-radius: 28px 28px 28px 28px;
        }

        .index-background-posize {
            position: absolute;
            top: 0px;
            height: 56px;
            left: 0px;
            flex-grow: 1;
            right: 0px;
            margin: 0px;
        }

        .index-txt4 {
            display: flex;
            justify-content: center;
            font: 700 24px/1.2 "Axis", Helvetica, Arial, serif;
            color: rgb(200, 50, 118);
            text-align: center;
            letter-spacing: 0;
        }

        .index-txt4-posize {
            position: relative;
            width: fit-content;
            margin: 17px auto 11px;
        }

        .index-flexbox3-item2 {
            display: flex;
            flex: 0 0 auto;
            min-height: 21px;
        }

        .index-txt-posize2 {
            position: relative;
            width: fit-content;
            margin: 0px;
        }
    </style>
</head>

<body>
<div class="index-group index-group-posize" >
        <div class="index-flexbox index-flexbox-posize2 flex flex-row justify-center items-center">
          <div class="index-flexbox-item">
            <div class="index-flexbox1 index-flexbox1-posize">
              <div class="index-group1 index-group1-posize">
                <div class="index-rect index-rect-posize"></div>
                <div class="index-rect1 index-rect1-posize"></div>
                <div style="--src:url(assets/9c8a65e2c2a9e6cdf991a84501e94ac2.png)" class="index-img index-img-posize"></div>
                <div class="index-rect2 index-rect2-posize"></div>
                <div class="index-rect3 index-rect3-posize"></div>
              </div>
              <div class="index-flexbox1-item">
                <div class="index-flexbox index-flexbox-posize">
                  <div class="index-flexbox2-item"><div class="index-txt index-txt-posize">About</div></div>
                  <div class="index-flexbox2-space"></div>
                  <div class="index-flexbox2-item1"><div class="index-txt index-txt-posize">Terms and Condition</div></div>
                </div>
              </div>
            </div>
          </div>
          <div class="index-flexbox-space"></div>
          <div class="index-flexbox-item1">
            <div class="index-flexbox3 index-flexbox3-posize">
              <div style="--src:url(assets/37ee585734f72e6bd2d3102f6994813b.png)" class="index-icon index-icon-posize"></div>
              <div class="index-flexbox3-item"><div class="index-txt2 index-txt2-posize">Bercerita, Berbagi, Berkonsultasi</div></div>
              <div class="index-flexbox3-item1">
                <div class="index-flexbox index-flexbox-posize1">
                <a href="daftar.php">  
                <div class="index-flexbox4-item">
                    <div class="index-coverGroup index-coverGroup-posize px-16"><div class="index-txt3 index-txt3-posize">Daftar</div></div>
                  </div>
                  </a>
                  
                  <a href="login.php">
                  <div class="index-flexbox4-item ml-3">
                    <div class="index-coverGroup1 index-coverGroup1-posize px-16">
                      <div class="index-background index-background-posize"></div>
                        <div class="index-txt4 index-txt4-posize">Masuk</div>
                    </div>
                  </div>
                  </a>
                </div>
              </div>
              <div class="index-flexbox3-item2"><div class="index-txt index-txt-posize2">Canshare 2020</div></div>
            </div>
          </div>
        </div>
      </div>
</body>

</html>
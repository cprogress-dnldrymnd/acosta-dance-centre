<?php $doro_options = get_option('doro'); ?>
<!-- Sidebar Section -->
<aside id="doro-aside">
  <!-- Logo -->
  <?php if (Doro_AfterSetupTheme::return_thme_option('textlogo') == 'st2') { ?>
    <div id="doro-logo">
      <a class="logo-holder text-logo" href="<?php echo esc_url(home_url('/')); ?>"><img
          src="<?php echo esc_url(Doro_AfterSetupTheme::return_thme_option('logopic', 'url')); ?>"
          alt="<?php bloginfo('name'); ?>">
        <?php if (!empty($doro_options['logotext2'])): ?>
          <span><?php echo esc_html(($doro_options['logotext2'])); ?></span>
        <?php endif; ?>

      </a>
    </div>
  <?php }
  else { ?>
    <div id="doro-logo">
      <a class="logo-holder text-logo" href="<?php echo esc_url(home_url('/')); ?>">
        <?php if (!empty($doro_options['logotext'])): ?>
          <?php echo esc_html(($doro_options['logotext'])); ?>
        <?php else: ?>
          <?php bloginfo('name'); ?>
        <?php endif; ?>
        <?php if (!empty($doro_options['logotext2'])): ?>
          <span><?php echo esc_html(($doro_options['logotext2'])); ?></span>
        <?php endif; ?>
        <span class="minimal-logo">
          <svg xmlns="http://www.w3.org/2000/svg" width="82.207" height="82.766" viewBox="0 0 82.207 82.766">
            <path id="logo-minimal"
              d="M241.164,291.593h-1.049a1.626,1.626,0,0,0-.245-.26,1.355,1.355,0,0,1-.38-.482,3.32,3.32,0,0,0-.161-.324,1.519,1.519,0,0,1-.251-.777c0-.116,0-.234,0-.348a3.224,3.224,0,0,1,.351-1.767,3.725,3.725,0,0,0,.275-.591c.055-.139.112-.283.179-.417a3.16,3.16,0,0,1,1.229-1.228,5.07,5.07,0,0,1,2.286-.72c.227-.017.456-.058.677-.1l.242-.041a.712.712,0,0,1,.116-.009c.057,0,.117.005.174.01s.118.01.175.01a.5.5,0,0,0,.387-.149.064.064,0,0,1,.046-.013.488.488,0,0,1,.069.007l.021,0a2.845,2.845,0,0,0,.41.028,6.794,6.794,0,0,0,.982-.1c.256-.038.52-.077.782-.091a7.86,7.86,0,0,0,2.039-.46,6.963,6.963,0,0,0,2.026-1.189c.305-.247.632-.478.948-.7.147-.1.3-.211.447-.318a1.077,1.077,0,0,0,.1-.085c.145-.132.292-.264.434-.392.327-.294.665-.6.985-.909a21.637,21.637,0,0,1,1.756-1.5c.251-.2.491-.419.723-.634.114-.105.231-.214.349-.319a36.321,36.321,0,0,1,4.541-3.416,12.633,12.633,0,0,1,3.072-1.526c.241-.074.486-.155.724-.232h0c.306-.1.622-.2.934-.3l.283-.086.008,0a12.794,12.794,0,0,1,1.345-.357c.282-.053.566-.115.841-.174.442-.1.9-.194,1.356-.262.126-.019.257-.027.384-.034a2.246,2.246,0,0,0,.669-.107,1.7,1.7,0,0,1,.591-.088,2.18,2.18,0,0,0,.406-.036l.34-.072a6.3,6.3,0,0,0,2.185-.744c.851-.547,1.491-.978,2.078-1.4a20.536,20.536,0,0,0,2.248-1.974l.114-.11a8.794,8.794,0,0,1,2.469-1.628l.323-.148c.4-.181.806-.368,1.19-.586a9.681,9.681,0,0,1,1.507-.646c.271-.1.551-.2.822-.314.117-.049.237-.1.353-.143a3.865,3.865,0,0,0,1.574-.94,4.034,4.034,0,0,0,.275-.364c.04-.057.081-.116.123-.173v-1.6a1.171,1.171,0,0,0-.786-.864,3.835,3.835,0,0,0-1.124-.143,1.532,1.532,0,0,1-.8-.267c.081-.1.159-.2.235-.306a5.871,5.871,0,0,1,.527-.635c.661-.657,1.343-1.28,1.864-1.75a1.986,1.986,0,0,1,.932-.448,11.968,11.968,0,0,1,2.256-.295,6.622,6.622,0,0,0,1.831-.291,1.792,1.792,0,0,0,1.064-.8c0-.125,0-.256,0-.394v-.008c0-.346.008-.738-.01-1.122a2.3,2.3,0,0,0-.166-.845c-.182-.388-.391-.771-.593-1.142-.126-.232-.257-.471-.38-.711-.194-.376-.381-.763-.562-1.137l0-.007c-.079-.162-.16-.33-.241-.495a5.076,5.076,0,0,1-.334-1.035,6.817,6.817,0,0,0-.224-.779l-.279-.74c0-.105,0-.223,0-.346-.005-.322-.012-.687.011-1.056a2.093,2.093,0,0,0-.434-1.305,9.487,9.487,0,0,1-1.157-2.27,1.353,1.353,0,0,1-.084-.525,5.912,5.912,0,0,0-.6-2.578,14.518,14.518,0,0,0-.938-1.936c-.189-.325-.367-.664-.539-.991s-.362-.69-.559-1.026a13.063,13.063,0,0,1-1.387-3.225c-.2-.76-.445-1.486-.7-2.254l0-.006q-.082-.245-.165-.492,0,.022,0,.043l-.019-.075c0-.011-.383-1.108-.808-2.726a39.735,39.735,0,0,1-1.127-6.049q0-2.028,0-4.059c.274-2.184,1.061-3.705,2.341-4.523a12.784,12.784,0,0,0-.106,2.42c.009.469.019.953,0,1.428a3.827,3.827,0,0,0,.078.811,3.547,3.547,0,0,1,.073.9,12.71,12.71,0,0,0-.01,1.484v.012q0,.1.006.2a.843.843,0,0,0,.063.253.837.837,0,0,1,.063.254.955.955,0,0,0,.085.324.692.692,0,0,1,.065.465.745.745,0,0,0,.058.463,1.315,1.315,0,0,1,.07.255,2.363,2.363,0,0,1,.006.406,2.162,2.162,0,0,0,.011.439c.078.469.187.942.292,1.4l.051.222a5.645,5.645,0,0,0,.873,1.9,7.752,7.752,0,0,1,.538,1c.115.243.234.494.369.73.607,1.067,1.157,2.172,1.568,3.016a9.7,9.7,0,0,1,.768,2.22,6.243,6.243,0,0,0,1.147,2.561,18.79,18.79,0,0,0,2.153,2.258l.311.291c.325.3.661.62,1,.925.135.123.277.243.415.359.188.158.381.321.56.495a5.9,5.9,0,0,1,1.105,1.444,5.249,5.249,0,0,1,.566,1.737.771.771,0,0,1,.118.544.945.945,0,0,0,.037.38,2.453,2.453,0,0,1,.117.992,3.694,3.694,0,0,0,.012.524.469.469,0,0,1-.434.238c-.046,0-.093,0-.134-.007h-.008c-.042,0-.08-.006-.118-.006l-.052,0a5.7,5.7,0,0,1-1.493-1.939c-.014-.025-.026-.051-.039-.077a.607.607,0,0,0-.09-.151c-.215-.237-.432-.492-.705-.829a3.451,3.451,0,0,0-.69-.594c-.1-.07-.2-.142-.292-.216a.771.771,0,0,0-.5-.15c-.063,0-.125,0-.186.007H292.8c-.06,0-.121.006-.18.006a1.125,1.125,0,0,1-.163-.01l-.044.044a1.094,1.094,0,0,0-.45.83.364.364,0,0,1,0,.055c0,.036-.008.07.007.082a.58.58,0,0,1,.162.51.981.981,0,0,0,.033.328,5.627,5.627,0,0,0,1.3,2.14c.405.421.825.841,1.231,1.247l0,0,.049.049a5.93,5.93,0,0,1,1.131,1.872l.021.046a5.372,5.372,0,0,1,.4,2.378c0,.156,0,.315,0,.469v0c0,.24.009.487-.01.729a2.281,2.281,0,0,0,1.142,2.086,6.614,6.614,0,0,0,1,.569c.122.06.248.123.371.187a5.084,5.084,0,0,0,1.1.376c.125.033.254.066.378.1a4.475,4.475,0,0,0,.911.16l.188.014c.219.016.445.033.666.033a2.88,2.88,0,0,0,.606-.057c.177-.038.358-.071.534-.1a6.368,6.368,0,0,0,1.609-.447c.6-.286,1.219-.611,1.9-.991a1.62,1.62,0,0,0,.354-.309c.064-.067.13-.136.207-.208a2,2,0,0,1-.047,1.114,2.309,2.309,0,0,0-.035.767c.007.106.013.206.013.3-.079.181-.159.356-.236.525-.168.368-.327.716-.455,1.078a13.779,13.779,0,0,1-1.431,2.935c-.158.244-.317.493-.47.735l0,0c-.287.453-.584.921-.894,1.37-.062.091-.122.186-.179.279a4.106,4.106,0,0,1-.3.438c-.154.188-.319.372-.48.55-.2.224-.41.456-.6.7a15.466,15.466,0,0,1-1.155,1.282c-.239.246-.485.5-.718.76a6.738,6.738,0,0,1-2.1,1.531,28.376,28.376,0,0,1-4.14,1.642c-.292.092-.6.166-.9.237h0l-.361.088c-.547.138-1.093.3-1.622.466l-.005,0-.556.169c-.4.12-.819.228-1.221.333-.218.057-.443.115-.664.175-.416.113-.842.217-1.254.317h0l-.579.143c-.212.053-.428.1-.637.147-.312.069-.635.141-.949.23-.415.118-.842.215-1.256.308-.482.109-.981.222-1.465.37-.351.107-.717.206-1.07.3-.206.056-.418.113-.624.172-.145.041-.295.076-.439.11a3.687,3.687,0,0,0-1.217.442.83.83,0,0,0-.146-.013,1.592,1.592,0,0,0-.593.156,2.031,2.031,0,0,1-.47.148,2.553,2.553,0,0,0-.621.2,2.782,2.782,0,0,1-.539.186,11.369,11.369,0,0,0-2.528.919l-.2.092c-.271.123-.547.245-.814.364-.721.319-1.465.649-2.179,1.023a9.692,9.692,0,0,0-1.578,1.076,31.255,31.255,0,0,1-3.25,2.292,13.147,13.147,0,0,1-3.2,1.384,12.658,12.658,0,0,1-1.525.375,10.582,10.582,0,0,0-1.631.441c-.295.1-.6.2-.89.288-.418.131-.849.267-1.262.421-.345.129-.7.247-1.046.361a17.468,17.468,0,0,0-1.689.624c-.329.148-.659.308-.978.462h0c-.367.177-.747.361-1.126.528-.442.194-.879.416-1.3.63-.2.1-.411.208-.617.31a12.676,12.676,0,0,0-1.678,1.05l-.1.067c-.346.242-.686.5-1.016.757h0c-.208.16-.424.326-.639.485s-.463.337-.69.5c-.251.179-.511.365-.763.553s-.482.368-.716.55l0,0c-.492.384-1,.781-1.533,1.119a3.4,3.4,0,0,0-.415.328,3.025,3.025,0,0,1-.479.367,12.542,12.542,0,0,0-1.3.905c-.169.128-.343.26-.515.386Zm39.854-6.582a3.912,3.912,0,0,1-.661-.071,9.262,9.262,0,0,1-1.823-.469,9.941,9.941,0,0,1-3.13-2.067c-.1-.1-.216-.183-.326-.268a3.762,3.762,0,0,1-.4-.338c-.177-.182-.339-.384-.5-.58-.081-.1-.164-.2-.249-.3s-.178-.2-.267-.287a2.985,2.985,0,0,1-.486-.595,3.712,3.712,0,0,0-.5-.636c-.092-.1-.187-.206-.274-.313s-.182-.239-.275-.368c-.044-.061-.089-.124-.136-.188l.942-.914.075-.073,1.249-1.212.352.186a8.257,8.257,0,0,0,1.947.831l.192-.359a4.745,4.745,0,0,0-.971-1.562v-.485h.028c.1,0,.206,0,.306,0s.221,0,.332,0c.167,0,.3,0,.43.013.248.017.494.057.732.1.1.017.2.033.3.047.113.1.225.2.333.295a6.008,6.008,0,0,0,.779.631,2.745,2.745,0,0,0,.843.3h.006l.127.031a.864.864,0,0,0,.208.021c.057,0,.117,0,.175-.007s.123-.007.185-.007a1.626,1.626,0,0,0,.665-1.323,4.15,4.15,0,0,1,.176-.827c.043-.152.087-.307.121-.462a1.27,1.27,0,0,1,.365-.549,1.59,1.59,0,0,0,.115-.127,4.265,4.265,0,0,1,1.016-.3,3.548,3.548,0,0,0,.771-.215.263.263,0,0,1,.109-.019l.072,0c.024,0,.05,0,.076,0h.016l.132,0a1.333,1.333,0,0,0,.655-.125.557.557,0,0,1,.276-.053h.144a.73.73,0,0,0,.366-.078,1.04,1.04,0,0,1,.454-.083,1.512,1.512,0,0,0,.456-.066,1.783,1.783,0,0,1,.516-.073,1.339,1.339,0,0,0,.592-.112.982.982,0,0,1,.5-.09h.029a.7.7,0,0,0,.553-.167c.062.006.126.009.191.009a4.086,4.086,0,0,0,.966-.156,4.881,4.881,0,0,1,.818-.152,8.065,8.065,0,0,0,1.611-.32,1.806,1.806,0,0,1,.416-.048,1.054,1.054,0,0,0,.672-.181h.043a5.571,5.571,0,0,0,1.107-.149,6.436,6.436,0,0,1,.966-.146,3.539,3.539,0,0,0,.8-.172c.149-.043.317-.092.5-.138-.125.207-.236.4-.344.577-.223.377-.416.7-.626,1.022-.226.343-.44.7-.648,1.046-.317.527-.644,1.072-1.016,1.577-.161.219-.328.44-.489.654-.263.349-.534.71-.791,1.071a21.834,21.834,0,0,1-2.987,3.251,11.009,11.009,0,0,1-3.371,2.308,6.667,6.667,0,0,0-1.7.962c-.1.082-.218.157-.328.23a3.705,3.705,0,0,0-.424.311c-.379.339-.748.689-1.105,1.028l-.006.006-.414.392c-.1.018-.2.03-.29.041a1.507,1.507,0,0,0-.532.125A1.553,1.553,0,0,1,281.018,285.011Zm-18.724-14.829c-.172,0-.35-.011-.522-.023s-.35-.022-.522-.022h-.062a2.543,2.543,0,0,1-1.272-.43,11.093,11.093,0,0,1-1.666-1.18,8.6,8.6,0,0,1-1.511-1.605,27.9,27.9,0,0,1-1.62-2.71,1.419,1.419,0,0,1-.129-.731,3.176,3.176,0,0,0-.014-.379,1.276,1.276,0,0,1,.248-.026.96.96,0,0,1,.719.327c.185.19.376.381.56.566v0l0,0c.285.286.58.582.862.88a6.515,6.515,0,0,0,1.495,1.112c.362.211.745.393,1.115.569l0,0c.128.061.259.123.388.186a3.5,3.5,0,0,0,1.509.459c.039,0,.079,0,.118,0h.01a.5.5,0,0,1,.2.064l.015.007a.449.449,0,0,0,.162.057.07.07,0,0,0,.037-.009,1.312,1.312,0,0,1,.432-.137.921.921,0,0,0,.59-.275.33.33,0,0,1,.141-.08.357.357,0,0,0,.138-.076,1.964,1.964,0,0,1,1.264-.52l.187-.029a2.036,2.036,0,0,0,.284-.077,1.361,1.361,0,0,1,.4-.087.466.466,0,0,1,.22.052,1.15,1.15,0,0,0,.467.111l.077.007a1.965,1.965,0,0,1,.68,1.035c.028.072.057.147.087.22a1.458,1.458,0,0,1-.056,1.537,1.554,1.554,0,0,0-.4.194,1.367,1.367,0,0,1-.717.264.555.555,0,0,1-.44.17.784.784,0,0,0-.365.089.938.938,0,0,1-.423.093,1.046,1.046,0,0,0-.407.081,1.909,1.909,0,0,1-.916.158,2.481,2.481,0,0,0-.728.076A2.167,2.167,0,0,1,262.295,270.182Zm52.541-16.137c-.1,0-.209,0-.312-.01h-.018c-.1,0-.215-.01-.326-.01-.074,0-.141,0-.2.007-.044,0-.088.005-.131.005a1.5,1.5,0,0,1-.872-.275c-.046-.032-.1-.06-.146-.088a.8.8,0,0,1-.28-.217,4.854,4.854,0,0,1-.48-.924.482.482,0,0,1,.039-.295,1.559,1.559,0,0,0,.045-.158c.064,0,.124-.01.181-.017a1.438,1.438,0,0,1,.176-.015.379.379,0,0,1,.272.1.237.237,0,0,0,.149.049.191.191,0,0,0,.038,0,.979.979,0,0,1,.193-.018,2.2,2.2,0,0,1,.517.084h0a2.194,2.194,0,0,0,.517.084h.036c.144-.005.3-.008.49-.008l.342,0h.024l.4,0a1.5,1.5,0,0,0,1.455-.888l.011-.021a4.162,4.162,0,0,1,.417-.712,1.2,1.2,0,0,1,.32-.253c.055-.035.112-.07.166-.109a2.805,2.805,0,0,0,.307.016,6.166,6.166,0,0,0,1.2-.16,8.6,8.6,0,0,1,.856-.142.607.607,0,0,1,0,.587.754.754,0,0,0-.07.413,1.493,1.493,0,0,1-.154.854l-.046.118a5.344,5.344,0,0,1-.3.617c-.055.1-.111.208-.169.322a4.035,4.035,0,0,0-.494.233,2.6,2.6,0,0,1-.762.3.386.386,0,0,0-.11.045.291.291,0,0,1-.129.045,5.4,5.4,0,0,0-1.072.149,5.352,5.352,0,0,1-1.082.149c-.081,0-.161,0-.238-.011A1.628,1.628,0,0,1,314.836,254.044Zm3.291-4.68h0a1.587,1.587,0,0,1-.557-.874c-.017-.048-.034-.094-.051-.14a5.616,5.616,0,0,0-1.469-2.21,3.147,3.147,0,0,0-.932-.451,2.943,2.943,0,0,0-1.005-.133h-.405l-.509-.006c-.236,0-.48-.006-.719-.006-.332,0-.607.006-.864.019l-.084,0a3.313,3.313,0,0,1-.9-.165,3.753,3.753,0,0,0-.773-.16l-.048-.028c-.669-.394-1.361-.8-1.528-1.689a.279.279,0,0,0-.068-.111c-.034-.04-.065-.078-.059-.112a2.369,2.369,0,0,0-.065-.87,3.22,3.22,0,0,1-.084-.626v-.032a2.308,2.308,0,0,0-.124-.906.857.857,0,0,1-.03-.375.679.679,0,0,0-.125-.548,2.619,2.619,0,0,0-.391-1.4c-.065-.133-.133-.27-.2-.412l.059-.028.236-.111-.016-.017,0,0-.044-.046h.18a3.194,3.194,0,0,1,1.116.705,7.075,7.075,0,0,1,1.128,1.38c.413.607.77,1.131,1.307,1.314a6.98,6.98,0,0,0,2.391.867,9.419,9.419,0,0,0,1.381.087c.239,0,.485.006.728.02a1.892,1.892,0,0,1,.645.132.546.546,0,0,0,.208.03h.078a.413.413,0,0,1,.349.126.434.434,0,0,1,.094-.011.553.553,0,0,1,.393.237.577.577,0,0,0,.371.236,6.756,6.756,0,0,1,1.88,2.743,3.288,3.288,0,0,1,.063,1.428,2.545,2.545,0,0,1-.689,1.4c-.19.185-.4.355-.6.519-.089.073-.182.148-.271.224Zm-18.795-10.536h0c-.072-.091-.134-.182-.194-.269a1.749,1.749,0,0,0-.38-.444,8.465,8.465,0,0,1-1.132-1.044,10.457,10.457,0,0,0-.884-.852,19.689,19.689,0,0,1-1.8-1.713c-.335-.354-.647-.722-.978-1.111-.148-.175-.3-.355-.458-.536a3.54,3.54,0,0,0-.389-1.469,26.54,26.54,0,0,0-1.811-3.27,8.477,8.477,0,0,1-.988-2.263,1.663,1.663,0,0,1,.376-1.514,6.094,6.094,0,0,1,1.3-1.219,2.4,2.4,0,0,1,1.331-.449h.718c.135,0,.247,0,.351,0a6.377,6.377,0,0,1,2.893.94,1.486,1.486,0,0,1,.156.1.964.964,0,0,0,.233.139,3.011,3.011,0,0,1,1.253,1.013,2.6,2.6,0,0,1,.423.877c.121.395.257.79.39,1.173v0h0c.084.243.171.5.253.744l.059.176,0,.006a4.963,4.963,0,0,1,.3,1.229c.011.158.039.321.067.478s.052.3.065.453a2.428,2.428,0,0,0,.119.5,3.205,3.205,0,0,1,.1.388,2.123,2.123,0,0,0,.1.332,1.262,1.262,0,0,1,.106.573c.143.1.132.257.121.405s-.023.306.126.41a1.048,1.048,0,0,0,.145.611,1.5,1.5,0,0,1,.142.4,6,6,0,0,0,.188.755c.02.067.04.134.059.2a1.519,1.519,0,0,1,.04.416c0,.062,0,.119,0,.175l-.164.155,0,0-.02.019-.122.116-.1-.18,0-.007-.161-.3c.145-.323.145-.323.139-.938-.055-.07-.117-.139-.177-.206a1.634,1.634,0,0,1-.341-.483,1.079,1.079,0,0,0-.295-.4,1.16,1.16,0,0,1-.232-.278,2.226,2.226,0,0,0-.983.463,5.327,5.327,0,0,0-1.2,1.613.616.616,0,0,0-.05.631c.357.725.721,1.458,1.073,2.168l.229.461v.815Zm-4.608-13.615a1.083,1.083,0,0,0-.6.275l0,0-.067.047V226.9c0,1.057.013,1.07.7,1.784l.029.03.076.079.019.02a7.426,7.426,0,0,1,.926,1.1,3.7,3.7,0,0,0,.613.724,2.1,2.1,0,0,0,1.466.666c.048,0,.1,0,.145-.006.077-.006.159-.009.26-.009l.224,0c.086,0,.174,0,.269,0,.051-.069.107-.138.167-.21a2.168,2.168,0,0,0,.359-.531,2.9,2.9,0,0,0,.066-1.911,5.275,5.275,0,0,0-1.12-2.213,1.9,1.9,0,0,0-1.235-1.041,3.6,3.6,0,0,0-1.358-.33,2.09,2.09,0,0,0-.327.025.629.629,0,0,0-.186.071.546.546,0,0,1-.249.079.349.349,0,0,1-.067-.007A.553.553,0,0,0,294.723,225.212Zm-3.893-13.54h0a.463.463,0,0,0-.152-.022c-.046,0-.092,0-.137.009s-.09.009-.136.009a.4.4,0,0,1-.286-.106.3.3,0,0,0-.187-.045h-.1c-.11,0-.22,0-.327,0s-.222,0-.338,0c-.187,0-.34,0-.481-.015a7.168,7.168,0,0,1-.779-.118c-.126-.024-.256-.048-.392-.071l-.036-.036h0l-.149-.152c.029-.217.062-.453.1-.7l.038-.278c.112-.035.222-.072.329-.109a4.073,4.073,0,0,1,.736-.2.7.7,0,0,1,.1-.007,1.9,1.9,0,0,1,.571.127l.032.011a2.106,2.106,0,0,1,1.614,1.44.4.4,0,0,1,0,.144c0,.035-.009.075-.012.123Z"
              transform="translate(-238.578 -209.327)" fill="#0f0f0f" stroke="rgba(0,0,0,0)" stroke-miterlimit="10"
              stroke-width="1" />
          </svg>
        </span>
      </a>
    </div>
  <?php }
  ; ?>

  <?php get_template_part('template-parts/header/menu-section'); ?>

  <!-- Woocommerce -->

  <div class="woo-icons">
    <ul class="list-inline d-flex justify-content-center align-items-center p-0">
      <li>
        <button data-toggle="modal" data-target="#searchModal">
          <svg xmlns="http://www.w3.org/2000/svg" width="27.472" height="27.479" viewBox="0 0 27.472 27.479">
            <path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search"
              d="M31.65,29.983l-7.641-7.712a10.889,10.889,0,1,0-1.653,1.674l7.591,7.662a1.176,1.176,0,0,0,1.66.043A1.184,1.184,0,0,0,31.65,29.983Zm-16.2-5.945a8.6,8.6,0,1,1,6.081-2.518A8.545,8.545,0,0,1,15.453,24.038Z"
              transform="translate(-4.5 -4.493)" fill="#0f0f0f" />
          </svg>
        </button>
      </li>
      <li>
        <a href="<?= get_permalink(wc_get_page_id('myaccount')) ?>">
          <svg xmlns="http://www.w3.org/2000/svg" width="26.419" height="29.472" viewBox="0 0 26.419 29.472">
            <g id="Icon_feather-user" data-name="Icon feather-user" transform="translate(1 1)">
              <path id="Path_2" data-name="Path 2"
                d="M30.419,31.657V28.6a6.1,6.1,0,0,0-6.1-6.1H12.1A6.1,6.1,0,0,0,6,28.6v3.052"
                transform="translate(-6 -4.185)" fill="none" stroke="#0f0f0f" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" />
              <path id="Path_3" data-name="Path 3" d="M24.21,10.6a6.1,6.1,0,1,1-6.1-6.1,6.1,6.1,0,0,1,6.1,6.1Z"
                transform="translate(-5.895 -4.5)" fill="none" stroke="#0f0f0f" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" />
            </g>
          </svg>
        </a>
      </li>
      <li>
        <a href="<?= wc_get_cart_url() ?>" class="cart-icon">
          <div class="cart-items">
            <span class="counter" id="cart-count"><?php
            $cart_count = WC()->cart->get_cart_contents_count();
            echo sprintf(_n('%d', '%d', $cart_count), $cart_count);
            ?></span>
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" width="32.119" height="29.472" viewBox="0 0 32.119 29.472">
            <g id="Icon_feather-shopping-cart" data-name="Icon feather-shopping-cart" transform="translate(1 1)">
              <path id="Path_90" data-name="Path 90"
                d="M15.052,31.409A1.531,1.531,0,1,1,13.526,30,1.471,1.471,0,0,1,15.052,31.409Z"
                transform="translate(-2.527 -5.346)" fill="none" stroke="#0f0f0f" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" />
              <path id="Path_91" data-name="Path 91"
                d="M31.552,31.409A1.531,1.531,0,1,1,30.026,30,1.471,1.471,0,0,1,31.552,31.409Z"
                transform="translate(-4.486 -5.346)" fill="none" stroke="#0f0f0f" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" />
              <path id="Path_92" data-name="Path 92"
                d="M1.5,1.5H6.976l3.669,16.978a2.7,2.7,0,0,0,2.738,2.041H26.69a2.7,2.7,0,0,0,2.738-2.041L31.619,7.84H8.345"
                transform="translate(-1.5 -1.5)" fill="none" stroke="#0f0f0f" stroke-linecap="round"
                stroke-linejoin="round" stroke-width="2" />
            </g>
          </svg>
        </a>
      </li>
    </ul>
  </div>

  <?php if (Doro_AfterSetupTheme::return_thme_option('nav-copyright') != 'no') { ?>
    <p><small>
        <?php if (!empty($doro_options['copyright2'])): ?>
          <span><?php echo do_shortcode(($doro_options['copyright2'])); ?></span>
        <?php else: ?>
          <span><?php esc_html_e('&#169; 2023 Doro By webRedox', 'doro'); ?></span>
        <?php endif; ?>
      </small></p>
  <?php } ?>
  </div>
</aside>
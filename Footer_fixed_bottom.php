  <!-- footer-1 -->
  <style>
      .footer {
          position: fixed;
          left: 0;
          bottom: 0;
          width: 100%;
          margin-top: 10px;
      }
  </style>
  <div class="footer">
      <span style="margin-left:10px;">© Developed By Acquaint Technologies</span>
      <img src="images/logo.png" style="height:40px;width:50px;float:right;">
  </div>

  <!-- footer-2 -->
  <style>
        html {
            position: relative;
        }
        body {
            margin: 0 0 100px 0;
            padding: 25px;
        }
        footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            overflow: hidden;
        }
    </style>
    <footer>
        <span>
            {{ $general_setting->address ?? '' }}
        </span>
        <img src="{{ asset('public/images/office.png') }}" style="height:40px;width:50px;float:right;">
    </footer>
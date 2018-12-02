@extends('layout')
@section('title','Home')
@section('content')
<!-- Navigation -->
<header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url('https://lh3.googleusercontent.com/rbplt12Boj1IRpaqhRNDkRL7iKRe7ZITc-g2tHJeEswKKVWZTe_UbYarU8aTrYPgUM3DnfekE6e8hMAZQcv3FwhxnpQozmOofQK20FERSHVWicyupykFsc6X319m6T5ESWQ64xuiCRQFMEf7NBb68PRpmv32nxYI8N9FTIJNPx0OsPcljL5GggncRIkC_qefMXfngm1UP9f-bV8SQhSdPgOm7RNwQDCNRg1M28gMCEkOOYz3gzblWxMxZwEsx-s-ntaPENmTnt2laoyc8QR87Zwog5vLHzff1dhcT10N4xWyqygewk0KgH2BSfUI4bageIYIm2QNVBLrqpJwhZkBbwjEs5i-kSmK-Xhy9Z-IXmALr52pvWkmqrPWaU9f0w4s9l2gQs1KqxUHsKPLPHC4gsI6ic2R5U6yjMZDthD9wv5h9tLKSCvQb_ppbGBgph7ma2wDdBqwqULsjNjBBeGEBHOOLxDe09Ub8p7QRI6IBuL2xrQSN5Jk28QMfZsXSW2xFYzSVGzvZ95FYDIubytB-ReFlPD1u3befkX_PBkzv-No5L4zvOeTANnIHL_vsdwZ98_itOYpmEY_7psvGod8BrbeLgJxQRndZ4CtJySNqsHOUTKfiHphGA6HFLYfpPuZ8jd3J_zGy1r4kVSMryXFOzek=w1148-h626-no')">
            <div class="carousel-caption d-none d-md-block">
              <!-- <h3>First Slide</h3>
              <p>This is a description for the first slide.</p> -->
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('https://lh3.googleusercontent.com/RWxzMLGjEpPAxdpU30kCFXpWVlYcmNu9oWDqrCYaf--fC7DhLYW0kO1WPPWPMi-GmQuP2o7SISc3mJ-bofiRLPhWAwo8O_4l3--AFytRX2PeuJAzE9D7dM7myKPxBCCKntXSS69OzX2ZmgNuQP_tWdUxX-j0e3CPvIJRUwyziZ8r0LyberwI0JPdYAYKmSNVQ3U9g5ziyZHxk9VPVFgkhK3IwAmpPYkcOjAJap8VHq_ktdielw7HPcc7aJ6zdXpW6PQ5nJq2ixi6V8ZO5nK0Rh_viMPCPmYUF-a85UMnOpLP3YWXUz93cz7dCKhfGbmt8fUW4pWYxyD1Bgg9OsDP0fbdJE6dWKiroRY2URW-S2hZfCy0g-RwV5ntTO8Jwce2cO6UTHPxt3QMo-Y5UxWz24BBsgJKG15DgKpB9c4MFc2qXPA_RxevghxEqDnX9ymXFECjqN_Q8MBGqRT9WfEtFig8Pw_TtWnechOjmJvNSj5ivOXncZDNsdBd7nNa6hJPzk4eSAhkFSCXR7vCiWuHWMy0f0ZqDsm23e1DizYB_OUB-YyhlUp_lhJBNeNBXyFyC-vqxS45piSW4lXmhPwqTVFo7JiIavOiW4Qq4NcjkSvPl0m2o8N-RkPLfybebG65p2H7zL3OiKWBSGDI7LZPkVeC=w1148-h626-no')">
            <div class="carousel-caption d-none d-md-block">
              <h3>To live is like to love</h3>
              <p>- all reason is against it, and all healthy instinct for it.</p>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url('https://lh3.googleusercontent.com/qDMArDZ2J7fjyLWyl-_Ot4fd7Ob1n98u4ZwipmpMTNSNA069LGIYqsLwP6elCXSqSp0n7f07-SX9hic7JCA2DaOY3OU9avE3UJwYUdgRLVssOuaIAsr7xUw4GXv90jEBWEvdJM4A5sm0O0bLDhTyeZ0QmBzecKPrhQ1jNCGDJxyvfAwfY-TShTl4p14Bfpp-O5Pua5znY-Awq8fPBmuoGkMcpkN2gk9Mc0MUk-quv0JDE0xvtdKA5MPnJ3YqePY1LgTNWv1mOobrCuk6cXXs8PWe5x3Mx8mf_NGjR1jLhsQgj5_HrD3BZd106jqmiMTOVKi3ZKC73OzuIygyBHfLTclRP6DD9mrZkjf3XWg8G_szb08VSKWc9wR-kUEZRSI38DfyhY5Xx9K9UyU8ixDHhjP5A9uZV7LZxYn-5Zr2HCH2WnaIFdDLauXr1wuiRU-f1K-lW6Zg4tpWKFVxOVTHLwPonTi4jt49p3gn0y1xW7wv7nQkBI8_ogXoF2xQPuehegFmg8UZf_i196DVXjCQUBUCrdKwOM4ksS8qKdQwVv_gWF6BtctqB1NyevJ0vVctqpBo_FA8eqb0Aw4y99rVRiwywD-17gd-gmFVelfR1hR07JNa_eosx5tPfax00g4Cqj9ERfVgCx0pfyTm77uGyAqI=w1148-h626-no')">
            <div class="carousel-caption d-none d-md-block">
              <h3>Life is the art</h3>
              <p>of drawing without an eraser.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>

    <!-- Page Content -->
    <div class="container">

      <!-- some code in temp-->
      <!-- /.row -->

      <!-- Portfolio Section -->
    <br></br>

      <h2>ARTICLES.</h2>

      <div class="row">
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="https://lh3.googleusercontent.com/1qOuBwxTUfRS6rfZ7QbBSa4VhCXyhCwXP8CcSP9BCvoirRsNZc9BDGIMrKFRIiIJRT0lIUW8WjacfaQnRGbETihLVFhOF4Noz9xrzGTUWe1i1JyNgosWq81l6O-A1iKmX1g-8lDCEBdHxeynSanBd0YvGgaWOUaAY6UneWEWd3v0B5NzPREjqK28jsV8OVCEvJAkh1TFJ5xORDYgDaOEUI9h_tmpPIwE310lTBO3-qBfTcM7wmgfZBsMNIX7Pny3Bag4o4Dt06Tdw6OjE-a9hU5-fOsDy9SzKqTRNnNY2EY6oam10o5wQss-jL_bgsu6kJXPHs3J1XuqCIrfncZ8vpP3KD99F4CSTmIOfCtkX7d3BWsktdHRYtcDiP3KXTd8c2snUiU_nBTKEDetNlHL4ACPDAUS6_Li5mhyxLC39f3K4kd4RpL6LFNVyO0AVBBjiazGdlR7dJgvI5g6i1pCjU0Ig9uKERcdinYosmPO8yTMykJu8r3GzN0TW1MqyHKlCckOVns4F8LqM_qIhsa6WugUdQs0OqP4Ar44mK1TdT8iGSWAlKcYpv-x74NDZlRSWc5YxXSVX-qgpHHz0LNXl1PHqCFDmWMI122rvMsp0dSqaOge66RNxC_zDwUm9TllSOK1m6K5oy6cc4EbyrRZdcr-=w282-h342-no" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
              <!-- ARTICLE_block1 -->
                <a href="#">The abstract</a>
              </h4>
              <p class="card-text">qualities in art are those which are independent of a work's resemblance to external reality. The arrangement of lines, forms, tone and colour, even in a painting depicting an aspect of the known world, can be viewed as a series of non-representational relationships.</p>
            </div>
          </div>
        </div>
              <!-- ARTICLE_block2 -->
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="https://lh3.googleusercontent.com/jBoDzewNlR5BN8YllWZtT8aRzou_H9IbkGYjZPhIaKd0dT5GhIm1e95ELALMXJGT_08ijTxGvqSj41kDofwUwiF8I3IdzpA6vr5xtbo3Vk4JXfeycbZLjhZTGQPaGYkokSvAcV9RBMOX8wyfTWGRGZxkdtU_KE20EVvwfmIqNn2nZ18MPwi7Ah1IBVdBAWJbgIGsYyryCwR5heoYXGVSiiq8Zct-xxo6NBXlmqLJi1sh_M58w9raB1R8rZzDV3W19M2_mpeZYC3zOil08aoVYjjNi3jmikm3kHG3tbkOjo8zI7Sg8D398MlyREXuBXC_2bTF-8AtUjjBMv_T1GdCyhac3YQr_JODPgrtFfxh8sY2BByE9fYqaAcW19Jqdrn9ZS9qbwbKStJFUdp2bf5b_i3Y5cov9EZvx6z5eylOWWbwrl8-QD632cvkkzFVLiKoUpEJBffbT0FM9lCH2nJ7hwGQJ2ZHkumi1gE71s40cNxLi9tNf2qSafvb98r_9SFEPKBmked8KQyNhMoMFn_7mVM2Z8BOZtb6A7wqdsbg2PVA62xreqaYcxITtWgaSppJtm3izfu29RB2M6h4OpCErNUWt9PvJbWuHXn7HDiNPQwGxDulCcpc0uy-65GqkT5n0CSsIw1L7rNPgiktjd7qHGmf=w432-h239-no" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">22 Art Exhibitions to View in N.Y.C. This Weekend</a>
              </h4>
              <p class="card-text">At this year’s Fine Art Print Fair at the Javits Center, ending on Sunday, you can compare this 1984 screen print of Edvard Munch’s “The Scream” by Andy Warhol to a 1895 black-and-white lithograph of it.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
            <a href="#"><img class="card-img-top" src="https://lh3.googleusercontent.com/f0A-5gG1bSFB815bkpG9cUBjmoRNA3LXUZOK7lSRjjzOBcShz0mSA8bvEt9Ybho3ssDyhzgC8QHnRZTDABUimy3C_v9mWqfnB-HkrRX1ROQUKB_4r49IpWp6XkdPEQBileO9CtbOwZlkcJJMmck0k824ZJ6t_DtEbpFqTVlqAtojz-BYR5TKXCtkIzoL3abKNhVKan95oqT6y8KIq3_fgbNLDYxwVFajfM7nNiqiZ2JEvR4RDuqMcm-CBTjmNeZ1nEZZHRDgxOuOMN4Y9CWw3yN6Cer_Hr0Mko2Q8yuFPVBUPU2fwMQOLJTJC6Kyh8cTrGIiIk7nu-hYwI5HXt_-wPOHxQLiUncdskw3rMN3ttNUk8fyoamrsULH81li5N2f_1br_oRN_CBc1OIGXDR-Q2AXc8gC0nLYz2BbHxf5feb47wt1ZpVUvy8YfsQ-N7q5nIa1jnRoz5si0znFr6zWi92H0c_CKpjxkf3QFscEej9aCaI7OPxKrdZfYs3P9JxVrgR5RjYe4I1bT-hcN56qzxsBLfZa0pY75rwRlXQo5bwB-PEsjhAXJQJM5tgF0g3Lo4y_jZ7wxzn8Cg0AsAy-PrX0k5ET5GVzZkEReDVVV7yFAFdqQw156dsWjCyvjos2LP2cE5k-ZYs5XaL2-ooHOaAE=w282-h339-no" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="#">Fine art print</a>
              </h4>
              <p class="card-text">at the Jacob K. Javits Convention Center (Oct. 26-27, noon-8 p.m.; Oct. 28 noon-6 p.m.). For this celebration of printmaking, more than 80 presenters have gathered to exhibit work by artists such as Henri Matisse, Pablo Picasso and Edward Hopper. </p>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->

      <!-- Features Section -->
      <div class="row">
        <div class="col-lg-6">
          <h2>CONTACT US</h2>
          <ul>
<li>
              <strong>@ 11 West 53 Street, New York, NY 10019</strong><br>
            10:30 a.m.–5:30 p.m.  <br>
Open seven days a week            <br>
Open until 8:00 p.m. on Fridays   <br>
Member Early Hours begin at 9:30 a.m.</li>
</li>
<li>              
              <strong>@ 22-25 JacksonAvenue, Long Island City,NY 11101</strong><br>
            09:30 a.m.–7:30 p.m.    <br>
Open eveyday but wednesday          <br>
Open until 8:00 p.m. on Fridays     <br>
Member Early Hours begin at 9:30 a.m.</li>
          </ul>
          <p>Phone : 212-1997-3018 | Email : art@museum.org |</p><p> Web page : www.artmuseum.org</p>        
          </div>
        <div class="col-lg-6">
          <img class="img-fluid rounded" src="https://lh3.googleusercontent.com/_Jv39Fj0LFmsJl2y9pni-LWodND949e7CxrqeE0yg-4Uh1EFyPJtu1x927S8ST7oMem3ub4W6zZo_S9zH3ufahQrHaGI6crFO5SPCHG4HEB4sJOBo8dRLNwddcjTF9zJ-3y-t2RrCaLBT5mXfnIhDix65uBbHRlehdeuHetcQSCxoaZf8r0lGF41YrOI2pPamaSHnxd0Ovqmpj9j46MQ58Vmlkig2UQdwJXYc1RHSfK0nxCvvo8a5TyPZUFaC7ObGCZHHpDQPovJBmYrnh3zXlg-SOKkURRscwBT2WUu1mWqT85MiAa9A4rqWfS1WwsnTEfsHCpV1uJvqAlaBGIM01IvuNMfpmazdV97erZOzwdgFvb_G1V0qcIMen4b5DtsyPMGra1yFz4PXNm0jmIgOmb5FyXWWUDIRQFCgwxvueMFbZ6z0kTxlZXK95bSoAM7Wudvx6l3w63r1CJivOfOe-MfLUQ769IW1p1pkD4r4dP5gn350MGo6tU3TwfyjoRWQg_bt_7DKy6vqSu6EUUI-gnrj3p0_mkLAYZ6ibEy9rYUMAhwEqQVYmIaKnCMlFge4r7C_uOIsvg3j3vpgN_uNmeoku31vuf3ItAiTU4cONxxP0IghBOY-k0H1dMy4emoZxXCOC7XhJsVVXbCttaXWfxf=w700-h450-no" alt="">
        </div>
      </div>
      <!-- /.row -->

      <hr>

    </div>
@endsection
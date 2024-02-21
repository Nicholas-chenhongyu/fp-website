<div class="cookiePopup modal fade show" id="cookieModal" tabindex="-1" role="dialog" aria-labelledby="cookieModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/cookie_header.png' ?>" alt="cookie">
      </div>
      <div class="modal-body">
        <h6>COOKIES</h6>
        <p>We use cookies and other technologies that store or access information on a user’s device on our website. Some of them are essential for the functioning of our website, while others help us to improve this website and your experience. Personal data may be processed (e.g. IP addresses) by us and/or by third-party technology providers. You can find more information about the use of your data in our <a href="<?php echo site_url() . "/privacy-policy/" ?>">Privacy Policy</a> and <a href="<?php echo site_url() . "/cookies-policy/" ?>">Cookies Policy</a>. You can revoke or adjust your selection at any time under the cookies setting. By clicking “Accept Cookies”, you agree to the storing of cookies on your device to keep your preference and analyze site usage.</p>
        <div class="btn-group">
          <button type="button" class="btn btn-primary accept">Accept Cookies</button>
          <button type="button" class="btn btn-black reject">Reject Cookies</button>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-outline cookie-config">Configure Cookies</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="cookiePopup modal fade show" id="cookieConfigModal" tabindex="-1" role="dialog" aria-labelledby="cookieConfigModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/cookie_header.png' ?>" alt="cookie">
      </div>
      <div class="modal-body">
        <div class="cookie-item">
          <div class="cookie-content">
            <h6>Privacy</h6>
            <p>When you visit our Sites, it will store small text files in the form of Cookies on a computer or other device. Cookies allow web servers to keep track of your browser activity. To clarify, a cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us. For more information about how we use cookies, please read our <a href="<?php echo site_url() . "/cookies-policy/" ?>">Cookie Policy</a>.</p>
          </div>
        </div>
        <div class="cookie-item">
          <div class="cookie-content">
            <h6>Preferences Cookies</h6>
            <p>These Cookies will allow our Sites to remember and store the preferences of the user and the user’s previous actions within the same browsing session. </p>
          </div>
          <!-- <input type="checkbox" id="preference" disabled checked /><label for="preference">Toggle</label> -->
        </div>
        <div class="cookie-item">
          <div class="cookie-content">
            <h6>Analytical Cookies</h6>
            <p>These Cookies will allow our Sites to remember and store the preferences of the user and the user’s previous actions within the same browsing session. </p>
          </div>
          <input type="checkbox" id="analytics" /><label for="analytics">Toggle</label>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary accept-all">Accept All</button>
          <button type="button" class="btn btn-black reject-all">Reject All</button>
        </div>
        <div class="btn-group">
          <button type="button" class="btn btn-outline save">Save Settings</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function setCookie(name, value, days) {
    var expires = "";
    if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
  }

  function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') c = c.substring(1, c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
  }

  function consentAccess(access) {
    // gtag('consent', 'update', {
    //   'ad_storage': access,
    //   'analytics_storage': access
    // });
    if (access === 'granted') {
      setCookie('fp_opt', 'in', 365)
    }
    if (access === 'denied') {
      setCookie('fp_opt', 'out', 365)
    }
  }

  jQuery(document).ready(() => {
    // only show the popup without fp_put cookie (first time visit)
    // fp_opt keep the access of GA as currently we only have ga cookies
    if (!getCookie('fp_opt')) {
      $('#cookieModal').modal()
    }

    // accept all cookies
    $('button.accept').click(function() {
      $('#cookieModal').modal('hide')
      consentAccess('granted')
    })

    // reject all cookies
    $('button.reject').click(function() {
      $('#cookieModal').modal('hide')
      consentAccess('denied')
    })

    // advanced config
    $('.cookie-config').click(function() {
      $('#cookieModal').modal('hide')
      $('#cookieConfigModal').modal()
    })
    $('button.accept-all').click(function() {
      $('.cookie-item input[type="checkbox"]').prop('checked', true);
    })
    $('button.reject-all').click(function() {
      $('.cookie-item input[type="checkbox"]:not(:disabled)').prop('checked', false);
    })
    $('button.save').click(function() {
      $('#cookieConfigModal').modal('hide')

      if ($('#analytics').is(":checked")) {
        consentAccess('granted')
      }
      if (!$('#analytics').is(":checked")) {
        consentAccess('denied')
      }
    })
  });
</script>
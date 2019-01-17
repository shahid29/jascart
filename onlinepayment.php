  <?php 
    
    include'inc/header.php';
    
    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <script src="../lib/jquery.payment.js"></script>

  <style type="text/css" media="screen">
    .has-error input {
      border-width: 2px;
    }
    .validation.text-danger:after {
      content: 'Validation failed';
    }
    .validation.text-success:after {
      content: 'Validation passed';
    }
  </style>

  <script>
    jQuery(function($) {
      $('[data-numeric]').payment('restrictNumeric');
      $('.cc-number').payment('formatCardNumber');
      $('.cc-exp').payment('formatCardExpiry');
      $('.cc-cvc').payment('formatCardCVC');
      $.fn.toggleInputError = function(erred) {
        this.parent('.form-group').toggleClass('has-error', erred);
        return this;
      };
      $('form').submit(function(e) {
        e.preventDefault();
        var cardType = $.payment.cardType($('.cc-number').val());
        $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
        $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
        $('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
        $('.cc-brand').text(cardType);
        $('.validation').removeClass('text-danger text-success');
        $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
      });
    });
  </script>

</head>
<body>
  <div class="container">
    <h1>
      jquery.payment demo
      <small><a class="btn btn-info btn-xs" href="https://github.com/stripe/jquery.payment">Fork on GitHub</a></small>
    </h1>
    <p>A general purpose library for building credit card forms, validating inputs and formatting numbers.</p>
    <form novalidate autocomplete="on" method="POST">
      <div class="form-group">
        <label for="cc-number" class="control-label">Card number formatting <small class="text-muted">[<span class="cc-brand"></span>]</small></label>
        <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required>
      </div>

      <div class="form-group">
        <label for="cc-exp" class="control-label">Card expiry formatting</label>
        <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required>
      </div>

      <div class="form-group">
        <label for="cc-cvc" class="control-label">Card CVC formatting</label>
        <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="•••" required>
      </div>

      <div class="form-group">
        <label for="numeric" class="control-label">Restrict numeric</label>
        <input id="numeric" type="tel" class="input-lg form-control" data-numeric>
      </div>

      <button type="submit" class="btn btn-lg btn-primary">Submit</button>

      <h2 class="validation"></h2>
    </form>
  </div>
</body>
</html>
   <?php
  $login =  Session::get("cuslogin");
      if ($login==true){?> 
 <?php include 'inc/footer.php' ;?>
<?php }else{?>
<?php include 'inc/footerwithoutlogin.php' ;?>
<?php }?>
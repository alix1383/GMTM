{* Smarty *}
<!DOCTYPE html>
<html lang="en">

<head>
  {include 'head.tpl'}
</head>

<body>
  <div class="form-check form-switch display-6">
    <input type="checkbox" class="form-check-input" id="darkSwitch" />
    <label class="custom-control-label" for="darkSwitch">Dark Mode</label>
  </div>
  <script src="./template/Spark/assets/js/dark-mode-switch.min.js"></script>
  <form class="text-center display-6" action="verify" method="POST">
    <div class="mb-3">
      <label for="apikey" class="form-label d-block">Steam Web Api Key</label>
      <input type="password" class="form-control w-50 d-inline-block" name="apikey" title="PassWord" />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  {if {$smarty.get.error} == 0 }
    <p class="text-center display-6 text-danger">Please enter a valid Web API key.</p>
  {/if}
</body>
</html>
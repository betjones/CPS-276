<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Form Project</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
  <div class="container">
    <form class="row g-3">
      <div class="col-md-6">
        <label for="fname" class="form-label">First Name</label>
        <input type="text" class="form-control" id="fname">
      </div>
      <div class="col-md-6">
        <label for="lname" class="form-label">Last Name</label>
        <input type="text" class="form-control" id="lname">
      </div>
      <div class="col-12">
        <label for="address" class="form-label">Address</label>
        <input type="text" class="form-control" id="address" placeholder="1234 Main St">
      </div>
      <div class="col-md-6">
        <label for="city" class="form-label">City</label>
        <input type="text" class="form-control" id="city">
      </div>
      <div class="col-md-4">
        <label for="state" class="form-label">State</label>
        <select id="state" class="form-select">
          <option selected>Choose...</option>
          <option value="alabama">Alabama</option>
          <option value="maryland">Maryland</option>
          <option value="michigan">Michigan</option>
          <option value="nebraska">Nebraska</option>
          <option value="utah">Utah</option>
        </select>
      </div>
      <div class="col-md-2">
        <label for="inputZip" class="form-label">Zip</label>
        <input type="text" class="form-control" id="inputZip">
      </div>
      <div class="col-md-6">
        <label for="phone" class="form-label">Phone</label>
        <input type="text" class="form-control" id="phone">
      </div>
      <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email">
      </div>
      <div class="col-md-12">
        <legend class="col-md-12">Preferred method of contact</legend>
          <input class="form-check-input" type="radio" name="emailbtn" id="emailbtn">
          <label class="form-check-label" for="flexRadioDefault1">
            Email
          </label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="textbtn" id="textbtn">
          <label class="form-check-label" for="flexRadioDefault2">
            Text
          </label>
        </div>
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
    </form>
  </div>
</body>

</html>
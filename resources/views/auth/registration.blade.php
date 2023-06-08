<style>
    body {
    align-items: center;
    background-color: #000;
    display: flex;
    justify-content: center;
    height: 100vh;
    }

    .form {
    background-color: #15172b;
    border-radius: 20px;
    box-sizing: border-box;
    height: 500px;
    padding: 20px;
    width: 320px;
    }
    .title {
    color: #eee;
    font-family: sans-serif;
    font-size: 36px;
    font-weight: 600;
    margin-top: 30px;
    }

    .subtitle {
    color: #eee;
    font-family: sans-serif;
    font-size: 16px;
    font-weight: 600;
    margin-top: 10px;
    }

    .input-container {
    height: 50px;
    position: relative;
    width: 100%;
    }

    .ic1 {
    margin-top: 40px;
    }

    .ic2 {
    margin-top: 30px;
    }

    .input {
    background-color: #303245;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    font-size: 18px;
    height: 100%;
    outline: 0;
    padding: 4px 20px 0;
    width: 100%;
    }

    .cut {
    background-color: #15172b;
    border-radius: 10px;
    height: 20px;
    left: 20px;
    position: absolute;
    top: -20px;
    transform: translateY(0);
    transition: transform 200ms;
    width: 76px;
    }

    .cut-short {
    width: 50px;
    }

    .input:focus ~ .cut,
    .input:not(:placeholder-shown) ~ .cut {
    transform: translateY(8px);
    }

    .placeholder {
    color: #65657b;
    font-family: sans-serif;
    left: 20px;
    line-height: 14px;
    pointer-events: none;
    position: absolute;
    transform-origin: 0 50%;
    transition: transform 200ms, color 200ms;
    top: 20px;
    }

    .input:focus ~ .placeholder,
    .input:not(:placeholder-shown) ~ .placeholder {
    transform: translateY(-30px) translateX(10px) scale(0.75);
    }

    .input:not(:placeholder-shown) ~ .placeholder {
    color: #808097;
    }

    .input:focus ~ .placeholder {
    color: #dc2f55;
    }

    .submit {
    background-color: #08d;
    border-radius: 12px;
    border: 0;
    box-sizing: border-box;
    color: #eee;
    cursor: pointer;
    font-size: 18px;
    height: 50px;
    margin-top: 38px;
    // outline: 0;
    text-align: center;
    width: 100%;
    }

    .submit:active {
    background-color: #06b;
    }
</style>
<main class="signup-form">
<div class="cotainer">
<div class="row justify-content-center">
<div class="col-md-4">
<div class="card">
<h3 class="title">Register User</h3>
<div class="card-body">
<form action="{{ route('register.custom') }}" method="POST">
@csrf
<div class="input-container ic1">
<input class="input" type="text"  placeholder="First Name" id="firstname" name="firstname"
required autofocus>
@if ($errors->has('firstname'))
<span class="text-danger">{{ $errors->first('firstname') }}</span>
@endif
</div>
<div class="input-container ic2">
<input class="input" type="text"  placeholder="Last Name" id="lastname" name="lastname"
required autofocus>
@if ($errors->has('lastname'))
<span class="text-danger">{{ $errors->first('lastname') }}</span>
@endif
</div>
<div  class="input-container ic2">
<input class="input" type="text" placeholder="Email" id="email_address"
name="email" required autofocus>
@if ($errors->has('email'))
<span class="text-danger">{{ $errors->first('email') }}</span>
@endif
</div>
<div class="input-container ic2">
<input type="password" placeholder="Password" id="password" class="input"
name="password" required>
@if ($errors->has('password'))
<span class="text-danger">{{ $errors->first('password') }}</span>
@endif
</div>
<div class="d-grid mx-auto">
<button type="submit" class="submit">Sign up</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</main>

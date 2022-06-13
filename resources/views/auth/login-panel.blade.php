@extends('layouts.app-fast')
@section('content')

<div id="account-login" class="container">
                  <ul class="breadcrumb">
                     <li><a href="https://livedemo00-opencart.template-help.com/opencart_kingburg/index.php?route=common/home"><i class="fa fa-home"></i></a></li>
                     <li><a href="https://livedemo00-opencart.template-help.com/opencart_kingburg/index.php?route=account/account">Account</a></li>
                     <li><a href="https://livedemo00-opencart.template-help.com/opencart_kingburg/index.php?route=account/login">Login</a></li>
                  </ul>
                  <div class="row">
                     <div id="content" class="col-sm-12">
                        <div class="row">
                           <div class="col-sm-6">
                              <div class="well" data-match-height="items-w">
                                 <h2>New Customer</h2>
                                 <p><strong>Register</strong></p>
                                 <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
                                 <a href="{{ route('register') }}">Continue</a>
                              </div>
                           </div>
                           <div class="col-sm-6">
                              <div class="well" data-match-height="items-w">
                                 <h2>Returning Customer</h2>
                                 <p><strong>I am a returning customer</strong></p>
                                 <form action="https://livedemo00-opencart.template-help.com/opencart_kingburg/index.php?route=account/login" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                       <label class="control-label" for="input-email">E-Mail Address</label>
                                       <input type="text" name="email" value="" placeholder="E-Mail Address" id="input-email" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                       <label class="control-label" for="input-password">Password</label>
                                       <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control" />
                                       <a href="https://livedemo00-opencart.template-help.com/opencart_kingburg/index.php?route=account/forgotten">Forgotten Password</a>
                                    </div>
                                    <input type="submit" value="Login" class="btn btn-primary" />
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

@endsection
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login - Pos Indonesia</title>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
   <style>
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Public Sans', sans-serif;
         }

         body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
         }

         .login-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 400px;
         }

         .login-header {
            text-align: center;
            margin-bottom: 30px;
         }

         .login-header img {
            width: 80px;
            margin-bottom: 15px;
         }

         .login-header h2 {
            color: #333;
            font-size: 28px;
            font-weight: 600;
         }

         .input-group {
            position: relative;
            margin-bottom: 25px;
         }

         .input-group input {
            width: 100%;
            padding: 15px 15px 15px 45px;
            border: none;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 16px;
            transition: all 0.3s ease;
         }

         .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #764ba2;
         }

         .input-group input:focus {
            outline: none;
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.3);
         }

         .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
         }

         .remember-me {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #666;
         }

         .forgot-password {
            color: #764ba2;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
         }

         .forgot-password:hover {
            color: #667eea;
         }

         .login-button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
         }

         .login-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(118, 75, 162, 0.4);
         }

         .register-link {
            text-align: center;
            margin-top: 25px;
            color: #666;
         }

         .register-link a {
            color: #764ba2;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
         }

         .register-link a:hover {
            color: #667eea;
         }

         @media (max-width: 480px) {
            .login-container {
               width: 90%;
               padding: 30px;
            }
         }
   </style>
</head>
<body>
      @include('sweetalert::alert')
      <div class="login-container">
         <div class="login-header">
            <h2>Login</h2>
         </div>
         
         <form action="{{ route('login.auth') }}" method="POST">
            @csrf
            <div class="input-group">
               <i class="fas fa-envelope"></i>
               <input type="email" placeholder="Email Address" name="email" required>
            </div>
            
            <div class="input-group">
               <i class="fas fa-lock"></i>
               <input type="password" placeholder="Password" name="password" required>
            </div>
            
            <button type="submit" class="login-button">Login</button>
         </form>
   </div>
</body>
</html>
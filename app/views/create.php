<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create</title>
  <style>
    body {
      font-family: 'Georgia', serif;
      background: #f8f1e1 url('https://img.freepik.com/premium-photo/vintage-backgrounds_726120-1267.jpg?w=2000');
      margin: 0;
      padding: 40px;
      color: #3e2723;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .frame {
      position: relative;
      border: 12px solid #6d4c41;
      border-radius: 12px;
      padding: 30px;
      background: rgba(255, 248, 231, 0.95);
      box-shadow: inset 0 0 25px rgba(0,0,0,0.3),
                  0 0 25px rgba(141, 110, 99, 0.7),
                  0 0 40px rgba(93, 64, 55, 0.5);
      width: 95%;
      max-width: 900px; /* mas wide para landscape */
      overflow: hidden;
      animation: glowFrame 3s infinite alternate;
    }

    @keyframes glowFrame {
      from { box-shadow: inset 0 0 25px rgba(0,0,0,0.3),
                     0 0 25px rgba(141, 110, 99, 0.6),
                     0 0 40px rgba(93, 64, 55, 0.4); }
      to   { box-shadow: inset 0 0 25px rgba(0,0,0,0.3),
                     0 0 40px rgba(141, 110, 99, 0.9),
                     0 0 60px rgba(93, 64, 55, 0.7); }
    }

    .frame::after {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 50%;
      height: 100%;
      background: linear-gradient(120deg,
        rgba(255,255,255,0) 0%,
        rgba(255,215,0,0.4) 50%,
        rgba(255,255,255,0) 100%);
      transform: skewX(-20deg);
      animation: frameShimmer 6s infinite;
    }

    @keyframes frameShimmer {
      0% { left: -100%; }
      50% { left: 120%; }
      100% { left: 120%; }
    }

    h1 {
      text-align: center;
      color: #5d4037;
      text-shadow: 1px 1px 0px #d7ccc8;
      margin-bottom: 20px;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      font-weight: bold;
      color: #4e342e;
    }

    input {
      padding: 10px;
      border: 2px solid #a1887f;
      border-radius: 6px;
      font-size: 1rem;
      background: #fff8e7;
      box-shadow: inset 0 0 6px rgba(0,0,0,0.2);
    }

    button, a {
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 8px;
      font-weight: bold;
      color: #fff;
      background-color: #6d4c41;
      position: relative;
      overflow: hidden;
      text-align: center;
      box-shadow: 0 0 10px rgba(141, 110, 99, 0.6);
      transition: all 0.3s ease-in-out;
      cursor: pointer;
      border: none;
    }

    a {
      display: inline-block;
      background-color: #8d6e63;
    }

    button::after, a::after {
      content: "";
      position: absolute;
      top: 0;
      left: -75px;
      width: 50px;
      height: 100%;
      background: linear-gradient(120deg,
        rgba(255,255,255,0.2),
        rgba(255,215,0,0.4),
        rgba(255,255,255,0.2));
      transform: skewX(-20deg);
      opacity: 0;
    }

    button:hover::after, a:hover::after {
      opacity: 1;
      animation: shimmer 1.2s forwards;
    }

    @keyframes shimmer {
      0%   { left: -75px; }
      100% { left: 120%; }
    }

    button:hover, a:hover {
      transform: scale(1.07);
      box-shadow: 0 0 18px rgba(141, 110, 99, 0.9),
                  0 0 28px rgba(93, 64, 55, 0.7),
                  0 0 40px rgba(255, 215, 0, 0.6);
      opacity: 0.95;
    }

    /* container para magtabi yung buttons */
    .button-group {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 15px;
    }
  </style>
</head>
<body>
  <div class="frame">
    <h1>Welcome to Create View</h1>
    <form action="<?=site_url('users/create');?>" method="post">
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name">

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email">

        <!-- buttons side by side -->
        <div class="button-group">
          <button type="submit">Submit</button>
          <a href="<?=site_url('users/show');?>">Back to Show</a>
        </div>
    </form>
  </div>
</body>
</html>

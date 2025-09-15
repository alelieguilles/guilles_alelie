<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= isset($user) ? 'Update' : 'Create' ?> User</title>
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
      width: 90%;
      max-width: 700px;
      animation: glowFrame 3s infinite alternate;
      overflow: hidden;
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
      margin-bottom: 25px;
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
      border: 1px solid #a1887f;
      border-radius: 6px;
      font-size: 15px;
      font-family: 'Georgia', serif;
      background: #fff8e7;
      transition: box-shadow 0.3s ease;
    }

    input:focus {
      outline: none;
      box-shadow: 0 0 10px rgba(141, 110, 99, 0.7);
    }

    button, a {
      text-decoration: none;
      padding: 10px 22px;
      border-radius: 8px;
      font-weight: bold;
      position: relative;
      overflow: hidden;
      display: inline-block;
      text-align: center;
      cursor: pointer;
      border: none;
      font-family: 'Georgia', serif;
      transition: all 0.3s ease-in-out;
      box-shadow: 0 0 10px rgba(141, 110, 99, 0.6);
      color: #fff;
    }

    button {
      background-color: #6d4c41; /* Submit button */
    }

    a {
      background-color: #8d6e63; /* Back button */
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

    .actions {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="frame">
    <h1><?= isset($user) ? 'Update User' : 'Create User' ?></h1>

    <form action="<?= isset($user) ? site_url('users/update/'.$user['id']) : site_url('users/create'); ?>" method="post">
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" 
               value="<?= isset($user) ? $user['last_name'] : '' ?>" required>

        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" 
               value="<?= isset($user) ? $user['first_name'] : '' ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" 
               value="<?= isset($user) ? $user['email'] : '' ?>" required>

        <div class="actions">
          <button type="submit"><?= isset($user) ? 'Update' : 'Create' ?></button>
          <a href="<?= site_url('users/show'); ?>">Back to Show</a>
        </div>
    </form>
  </div>
</body>
</html>

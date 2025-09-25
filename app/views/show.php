<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Show</title>
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
      max-width: 1000px;
      overflow: hidden;
      animation: glowFrame 3s infinite alternate;
    }

    /* Pulsating glow for frame */
    @keyframes glowFrame {
      from { box-shadow: inset 0 0 25px rgba(0,0,0,0.3),
                     0 0 25px rgba(141, 110, 99, 0.6),
                     0 0 40px rgba(93, 64, 55, 0.4); }
      to   { box-shadow: inset 0 0 25px rgba(0,0,0,0.3),
                     0 0 40px rgba(141, 110, 99, 0.9),
                     0 0 60px rgba(93, 64, 55, 0.7); }
    }

    /* Shimmering golden light across the frame */
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
      margin-bottom: 30px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff8e7;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    th, td {
      padding: 12px 15px;
      border: 1px solid #a1887f;
      text-align: center;
    }

    th {
      background-color: #d7ccc8;
      color: #3e2723;
    }

    tr:nth-child(even) {
      background-color: #f1e2c6;
    }

    tr:hover {
      background-color: #e0c097;
      transition: 0.3s;
    }

    a {
      text-decoration: none;
      padding: 6px 14px;
      border-radius: 6px;
      font-weight: bold;
      position: relative;
      overflow: hidden;
      display: inline-block;
      box-shadow: 0 0 10px rgba(141, 110, 99, 0.6);
      transition: all 0.3s ease-in-out;
    }

    a[href*="update"] {
      background-color: #8d6e63;
      color: #fff;
    }

    a[href*="delete"] {
      background-color: #a1887f;
      color: #fff;
    }

    a[href*="create"] {
      display: block;
      width: fit-content;
      margin: 20px auto 0;
      background-color: #6d4c41;
      color: #fff;
      padding: 10px 22px;
      border-radius: 8px;
      text-align: center;
    }

    /* Golden shimmer effect for buttons */
    a::after {
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

    a:hover::after {
      opacity: 1;
      animation: shimmer 1.2s forwards;
    }

    @keyframes shimmer {
      0%   { left: -75px; }
      100% { left: 120%; }
    }

    a:hover {
      transform: scale(1.07);
      box-shadow: 0 0 18px rgba(141, 110, 99, 0.9),
                  0 0 28px rgba(93, 64, 55, 0.7),
                  0 0 40px rgba(255, 215, 0, 0.6);
      opacity: 0.95;
    }
  </style>
</head>
<body>
  <div class="frame">
    <h1>Welcome to Show View</h1>

    <!-- Search Form -->
    <div style="margin-bottom: 30px; text-align: center;">
      <form method="GET" action="<?=site_url('users/show');?>" style="display: inline-block;">
        <input type="text"
               name="search"
               placeholder="Search by name or email..."
               value="<?=html_escape($search ?? '');?>"
               style="padding: 8px 15px;
                      border: 2px solid #a1887f;
                      border-radius: 6px;
                      font-size: 14px;
                      width: 300px;
                      background: rgba(255, 248, 231, 0.9);
                      color: #3e2723;">
        <button type="submit"
                style="padding: 8px 20px;
                       background-color: #6d4c41;
                       color: #fff;
                       border: none;
                       border-radius: 6px;
                       cursor: pointer;
                       font-weight: bold;
                       margin-left: 10px;
                       box-shadow: 0 0 10px rgba(141, 110, 99, 0.6);
                       transition: all 0.3s ease-in-out;">Search</button>
        <?php if (!empty($search)): ?>
          <a href="<?=site_url('users/show');?>"
             style="padding: 8px 15px;
                    background-color: #a1887f;
                    color: #fff;
                    text-decoration: none;
                    border-radius: 6px;
                    margin-left: 10px;
                    box-shadow: 0 0 10px rgba(141, 110, 99, 0.6);
                    transition: all 0.3s ease-in-out;">Clear</a>
        <?php endif; ?>
      </form>
    </div>

    <!-- Results Info -->
    <?php if (isset($total_users)): ?>
      <div style="text-align: center; margin-bottom: 20px; color: #5d4037; font-weight: bold;">
        Showing <?=$total_users > 0 ? (($current_page - 1) * $per_page) + 1 : 0;?>-<?=min($current_page * $per_page, $total_users);?> of <?=$total_users;?> results
        <?php if (!empty($search)): ?>
          for "<span style="color: #8d6e63;"><?=$search;?></span>"
        <?php endif; ?>
      </div>
    <?php endif; ?>

    <table>
      <tr>
        <th>ID</th>
        <th>Last Name</th>
        <th>First Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
      <?php foreach (html_escape($users) as $user): ?>
        <tr>
          <td><?=$user['id'];?></td>
          <td><?=$user['last_name'];?></td>
          <td><?=$user['first_name'];?></td>
          <td><?=$user['email'];?></td>
          <td>
            <a href="<?=site_url('users/update/'.$user['id']);?>">Update</a> |
            <a href="<?=site_url('users/delete/'.$user['id']);?>">Delete</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </table>

    <!-- Pagination -->
    <?php if (isset($pagination_links)): ?>
      <div style="margin: 30px 0; text-align: center;">
        <?=$pagination_links;?>
      </div>
    <?php endif; ?>

    <a href="<?=site_url('users/create');?>">Create Record</a>
  </div>
</body>
</html>

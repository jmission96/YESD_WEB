<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YESD</title>
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <div class="buttons">
    <a href="login.php">Get Started</a>
    <a href="about.php">About</a>
  </div>
  <div class="wrapper">
    <img src="images/yesd_logo.png" alt="YESD Logo" style="width: 300px; height: auto; margin-bottom: 20px;">
    <h1>
      Youth for Education in Sustainable Development (YESD)
    </h1>
    <h2>BISU Bilar Chapter</h2>
    <p>
      is a non-profit organization that aims to promote education and awareness about sustainable development among
      young people. Our mission is to empower youth to take action towards a more sustainable future through education,
      advocacy, and community engagement.
    </p>

  </div>

</body>

<style>
    .buttons {
      text-align: right;
      width: 100%;
      margin-top: 1rem;
    }

    img {
      max-width: 100%;
      height: auto;
    }

    h1 {
      width: 55%;
      margin: 0 auto;
    }

    h2 {
      margin-bottom: 1rem;
    }

    p {
      font-size: 1em;
      color: white;
      width: 60%;
      margin: 0 auto;
    }

    a {
      margin-top: -1rem;
      margin-left: 10px;
      display: inline-block;
      padding: 10px 20px;
      background-color: rgb(0, 113, 189);
      color: white;
      text-decoration: none;
      border-radius: 5px;
      font-size: 1em;
    }

    a:hover {
      background-color: #2980b9;
    }

    h1 {
      color: rgb(0, 255, 8);
      font-size: 2.5em;
      text-align: center;
    }

    h2 {
      color: rgb(0, 255, 8);
      font-size: 1.5em;
      text-align: center;
    }

    @media (max-width: 768px) {
      h1, h2, p {
        width: 100%;
        margin: 0 auto;
      }

      h1 {
        font-size: 2em;
      }

      h2 {
        font-size: 1.5em;
        margin-bottom: 1rem;
      }
      p {
        font-size: 1em;
      }

      .buttons {
        position: fixed;
        bottom: 20px;
        left: 0;
        width: 100%;
        text-align: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        z-index: 999;
      }

      a {
        display: block;
        margin: 5px 0;
        width: 80%;
        text-align: center;
      }
    }
  </style>

</html>
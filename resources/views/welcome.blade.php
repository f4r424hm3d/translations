<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Beautiful Table</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    table {
      width: 80%;
      margin: 50px auto;
      border-collapse: collapse;
      border-spacing: 0;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      background-color: #fff;
    }

    th,
    td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #4CAF50;
      color: white;
    }

    tr:hover {
      background-color: #f5f5f5;
    }

    /* nabar css */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    header {
      background-color: #333;
      color: white;
      padding: 10px;
      text-align: center;
    }

    nav {
      display: flex;
      justify-content: space-around;
      background-color: #555;
      padding: 10px;
    }

    nav a {
      color: white;
      text-decoration: none;
      padding: 10px;
      display: inline-block;
    }

    nav ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: none;
      position: absolute;
      background-color: #333;
    }

    nav li:hover ul {
      display: block;
    }

    nav ul li {
      display: block;
    }

    section {
      text-align: center;
      margin: 20px;
    }

    /* Style for the dropdown */
    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #333;
      min-width: 160px;
      z-index: 1;
    }

    .dropdown-content a {
      color: white;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #555;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
</head>

<body>

  <header>
    <h1>Translation by Mohammad Faraz</h1>
  </header>

  <nav>
    <a href="{{ langUrl($languageCode, '/') }}">Home</a>
    <a href="{{ langUrl($languageCode, 'about-us') }}">About</a>

    <select name="language" id="language">
      <option value="" disabled selected>Choose Language</option>
      @forelse($languages as $language)
        <option value="{{ $language->code }}">{{ ucfirst($language->name) }}</option>
      @empty
      @endforelse
    </select>
  </nav>

  <section style="padding-top: 50px !important">
    {{ __('messages.welcome') }}
  </section>

  @if ($translation)
    <table>
      <thead>
        <tr>
          <th>Language</th>
          <th>Name</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>{{ $translation->language ? ucfirst($translation->language->name) : '' }}</td>
          <td>{{ $translation->name }}</td>
          <td>{{ $translation->description }}</td>
        </tr>
      </tbody>
    </table>
  @else
    <h4 style="color: red; text-align: center">No record found.</h4>
  @endif

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      $('#language').change(function() {
        let language = this.value;

        if (language === 'en') {
          window.location.href = "/";
        } else {
          window.location.href = "/" + language;
        }
      });
    });
  </script>

</body>

</html>

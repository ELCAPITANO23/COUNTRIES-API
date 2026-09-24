<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Countries API</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem 1rem;
            line-height: 1.6;
            color: #1f2937;
            background: #f9fafb;
        }
        h1 { color: #111827; border-bottom: 2px solid #3b82f6; padding-bottom: .5rem; }
        h2 { color: #1f2937; margin-top: 2rem; }
        h3 { color: #374151; }
        code {
            background: #e5e7eb;
            padding: .15rem .4rem;
            border-radius: 4px;
            font-size: .9em;
            font-family: ui-monospace, Menlo, monospace;
        }
        pre {
            background: #1e293b;
            color: #e2e8f0;
            padding: 1rem;
            border-radius: 8px;
            overflow-x: auto;
            font-size: .85em;
            line-height: 1.5;
        }
        pre code { background: none; padding: 0; color: inherit; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 1rem 0;
            font-size: .9em;
        }
        th, td {
            text-align: left;
            padding: .5rem .75rem;
            border-bottom: 1px solid #e5e7eb;
        }
        th { background: #f3f4f6; font-weight: 600; }
        .badge {
            display: inline-block;
            background: #dbeafe;
            color: #1e40af;
            padding: .15rem .5rem;
            border-radius: 999px;
            font-size: .75em;
            font-weight: 600;
        }
        .badge.public { background: #dcfce7; color: #166534; }
        .badge.protected { background: #fee2e2; color: #991b1b; }
        hr { border: none; border-top: 1px solid #e5e7eb; margin: 2rem 0; }
    </style>
</head>
<body>

    <h1>Countries API</h1>
    <p>A RESTful API built with <strong>Laravel</strong> and <strong>Laravel Sanctum</strong> for token-based authentication.</p>

    <h2>Features</h2>
    <ul>
        <li>User registration &amp; login with Sanctum tokens</li>
        <li>Full CRUD for countries</li>
        <li>Token-protected routes</li>
        <li>Request validation with <code>sometimes</code> / <code>nullable</code> rules</li>
        <li>Clean JSON responses</li>
    </ul>

    <h2>Tech Stack</h2>
    <p>
        <span class="badge">Laravel</span>
        <span class="badge">MySQL</span>
        <span class="badge">Sanctum</span>
    </p>

    <h2>Endpoints</h2>

    <h3>Auth — Public</h3>
    <table>
        <tr><th>Method</th><th>Endpoint</th><th>Description</th></tr>
        <tr><td>POST</td><td><code>/api/register</code></td><td>Register a new user</td></tr>
        <tr><td>POST</td><td><code>/api/login</code></td><td>Login and receive a token</td></tr>
    </table>

    <h3>Auth — Protected <span class="badge protected">token required</span></h3>
    <table>
        <tr><th>Method</th><th>Endpoint</th><th>Description</th></tr>
        <tr><td>GET</td><td><code>/api/me</code></td><td>Get the authenticated user</td></tr>
        <tr><td>POST</td><td><code>/api/logout</code></td><td>Revoke the current token</td></tr>
    </table>

    <h3>Countries — Protected <span class="badge protected">token required</span></h3>
    <table>
        <tr><th>Method</th><th>Endpoint</th><th>Description</th></tr>
        <tr><td>GET</td><td><code>/api/countries</code></td><td>List all countries</td></tr>
        <tr><td>POST</td><td><code>/api/countries</code></td><td>Create a country</td></tr>
        <tr><td>GET</td><td><code>/api/countries/{id}</code></td><td>Show one country</td></tr>
        <tr><td>PUT/PATCH</td><td><code>/api/countries/{id}</code></td><td>Update a country</td></tr>
        <tr><td>DELETE</td><td><code>/api/countries/{id}</code></td><td>Delete a country</td></tr>
    </table>

    <hr>

    <h2>Example Requests (IntelliJ HTTP Client)</h2>

    <h3>Register</h3>
<pre><code>### Register
POST http://127.0.0.1:8000/api/register
Content-Type: application/json
Accept: application/json

{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "secret123",
    "password_confirmation": "secret123"
}</code></pre>

    <h3>Login</h3>
<pre><code>### Login
POST http://127.0.0.1:8000/api/login
Content-Type: application/json
Accept: application/json

{
    "email": "john@example.com",
    "password": "secret123"
}</code></pre>

    <h3>List countries (with token)</h3>
<pre><code>### List all countries
GET http://127.0.0.1:8000/api/countries
Accept: application/json
Authorization: Bearer 1|your-token-here</code></pre>

    <h3>Create a country</h3>
<pre><code>### Create a country
POST http://127.0.0.1:8000/api/countries
Content-Type: application/json
Accept: application/json
Authorization: Bearer 1|your-token-here

{
    "name": "Tanzania",
    "capital": "Dodoma",
    "code": "TZ",
    "continent": "Africa",
    "population": 59734218
}</code></pre>

    <h3>Update a country</h3>
<pre><code>### Update by id
PUT http://127.0.0.1:8000/api/countries/11
Content-Type: application/json
Accept: application/json
Authorization: Bearer 1|your-token-here

{
    "population": 63435098
}</code></pre>

    <h3>Delete a country</h3>
<pre><code>### Delete by id
DELETE http://127.0.0.1:8000/api/countries/11
Accept: application/json
Authorization: Bearer 1|your-token-here</code></pre>

    <hr>
    <p style="text-align:center; color:#6b7280; font-size:.85em;">
        Built with Laravel · Tested with IntelliJ HTTP Client
    </p>

</body>
</html>

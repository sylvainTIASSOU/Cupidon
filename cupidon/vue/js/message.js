let envoie = document.querySelector("#envoie");
let form = document.querySelector("#form");

form.addEventListener('submit', function(e)
{
    e.preventDefault();
    let xhr = new XMLHttpRequest();

    let data = new FormData(form);

    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4)
        {
            if(xhr.status == 200)
            {
                let datas = xhr.responseText;
                envoie.innerHTML = datas;

               
            }
        }
    }

    xhr.open("POST", "../../traitement/messageAction.php", true);

    xhr.send(data);
    
})

setInterval(
    function()
    {
        let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4)
        {
            if(xhr.status == 200)
            {
                let datas = xhr.responseText;
                envoie.innerHTML = datas;

               
            }
        }
    }

    xhr.open("POST", "../../traitement/messageAction.php", true);
    }

, 500)
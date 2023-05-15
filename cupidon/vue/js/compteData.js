let section = document.querySelector('#section');



let xhr = new XMLHttpRequest();

xhr.onreadystatechange = function()
{
    if(xhr.readyState == 4)
    {
        if(xhr.status == 200)
        {
            let data = xhr.response;
            section.innerHTML = data;

        }
    }
}

xhr.open("POST", '../page/compteData.php', true);

xhr.send();

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
                    let data = xhr.response;
                    section.innerHTML = data;

                }
            }
        }

        xhr.open("POST", '../page/compteData.php', true);

        xhr.send();
    }
    ,100);
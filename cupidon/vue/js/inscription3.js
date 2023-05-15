let erreur = document.querySelector("#errorMessage");
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
                let servResponse = xhr.responseText
               if(servResponse == "success")
               {
                    location.href = "../../traitement/inscriptionAction11.php";
               }
               else
               {
                erreur.innerHTML = servResponse;
               }
            }
        }
    }

    xhr.open("POST", "../../traitement/inscriptionAction3.php", true);

    xhr.send(data);
    
})

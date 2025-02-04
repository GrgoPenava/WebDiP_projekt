<div class="wrapper">
  <main>
    <section>
    <h1 style="display:flex; flex-direction:row; align-items:center; justify-content:center; margin-top:3rem;">Ispunite informacije kako biste kreirali profil</h1>
      <div style="min-height:40rem; min-width:98vw; padding-top:5rem;">
      <div style="display:flex; flex-direction:row; align-items:center; justify-content:center; margin-top:4rem;gap:3rem;">
                <div class="prijava">
                <form id="formprofil" method="POST" name="formprofil" novalidate enctype="multipart/form-data">
                <label for="nadimak">Nadimak: </label>
                <input type="nadimak" id="nadimak" name="nadimak" size="30" placeholder="nadimak" required="required" oninput="provjera()"/><br />
                <label for="slika">Slika: </label>
                <input type="file" id="slika" name="slika" oninput="provjera()" accept="image/*"/><br /><br/>
                <input id="submit" type="submit" value="Kreiraj profil" name="kreirajprofilButton" disabled/>
              </form>
              </div>
      </div>
      </div>
</div>

<script type="text/javascript">

function provjera(){
    let nadimak = document.getElementById('nadimak').value;
    let submitButton = document.getElementById('submit');
    if(provjeraSlike() == true && nadimak.length>0){
        submitButton.disabled = false;
    }else{
        submitButton.disabled = true;
    }
}

function provjeraSlike(){
let datoteka = document.getElementById('slika').files[0].name;
let splitaninaziv = datoteka.split(".");
if(splitaninaziv[1] === "png"){
    return true;
}else{
    return false;
}
}
</script>
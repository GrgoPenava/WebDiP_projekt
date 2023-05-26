<main>
    <section class="centeredsection" style="height: 60rem;">
      <div style="margin-top:5rem;">
        <p class="dodavanjenoveporuke">Uređivanje proizvoda</p>
        {if isset($porukaGreske)}
        <p class="dodavanjenoveporuke" style="color:red;">{$porukaGreske}</p>
        {/if}
        {if isset($porukaUspjeha)}
        <p class="dodavanjenoveporuke" style="color:green;">{$porukaUspjeha}</p>
        {/if}
        <form id="kreirajKampanju" method="post" name="urediProizvod" action="" novalidate enctype="multipart/form-data">
          <fieldset>
            <legend>Proizvod:</legend>
            <label for="naziv">Naziv: </label>
            <input type="text" id="naziv" name="naziv" placeholder="naziv" required="required" oninput="provjera()" {if isset($proizvodZaUrediti["naziv"])} value="{$proizvodZaUrediti["naziv"]}"{/if} /><br />
            <label for="naziv_eng">Naziv (eng): </label>
            <input type="text" id="naziv_eng" name="naziv_eng" placeholder="naziv(eng)" required="required" oninput="provjera()" {if isset($proizvodZaUrediti["naziv_eng"])} value="{$proizvodZaUrediti["naziv_eng"]}"{/if} /><br />
            <label for="opis">Opis: </label>
            <textarea cols=30 rows=5 id="opis" name="opis" placeholder="opis" oninput="provjera()">{if isset($proizvodZaUrediti["opis"])}{$proizvodZaUrediti["opis"]}{/if}</textarea><br/>
            <label for="opis_eng">Opis (eng): </label>
            <textarea cols=30 rows=5 id="opis_eng" name="opis_eng" placeholder="opis(eng)" oninput="provjera()">{if isset($proizvodZaUrediti["opis_eng"])}{$proizvodZaUrediti["opis_eng"]}{/if}</textarea><br/>
            <label for="kolicina">Kolicina: </label>
            <input type="text" id="kolicina" name="kolicina" placeholder="20" required="required" oninput="provjera()" {if isset($proizvodZaUrediti["kolicina"])} value="{$proizvodZaUrediti["kolicina"]}"{/if} /><br />
            <label for="cijena">Cijena: </label>
            <input type="text" id="cijena" name="cijena" placeholder="100" required="required" oninput="provjera()" {if isset($proizvodZaUrediti["cijena"])} value="{$proizvodZaUrediti["cijena"]}"{/if} /><br />
            <label for="cijena_eng">Cijena(eng): </label>
            <input type="text" id="cijena_eng" name="cijena_eng" placeholder="100" required="required" oninput="provjera()" {if isset($proizvodZaUrediti["cijena_eng"])} value="{$proizvodZaUrediti["cijena_eng"]}"{/if} /><br />
            <label for="cijena_u_bodovima">Cijena u bodovima: </label>
            <input type="text" id="cijena_u_bodovima" name="cijena_u_bodovima" placeholder="50" required="required" oninput="provjera()" {if isset($proizvodZaUrediti["cijena_u_bodovima"])} value="{$proizvodZaUrediti["cijena_u_bodovima"]}"{/if} /><br />
            <label for="bodovizakupovinu">Bodovi za kupovinu (koje korisnik dobije): </label>
            <input type="text" id="bodovizakupovinu" name="bodovizakupovinu" placeholder="5" required="required" oninput="provjera()" {if isset($proizvodZaUrediti["bodovi_za_kupovinu"])} value="{$proizvodZaUrediti["bodovi_za_kupovinu"]}"{/if} /><br />
            <label for="status_proizvoda">Status proizvoda:</label>
            <select id="status_proizvoda" name="status_proizvoda" onchange="provjera()">
            {foreach $sviStatusi as $status}
                <option value="{$status['id_status_proizvoda']}" onchange="provjera()" {if isset($proizvodZaUrediti["id_status_proizvoda"]) && $status['id_status_proizvoda'] == $proizvodZaUrediti["id_status_proizvoda"]} selected{/if}>{$status['naziv']}</option>
            {/foreach}
            </select>
            <br/>
            <label for="Tip_proizvoda">Tip proizvoda:</label>
            <select id="tip_proizvoda" name="tip_proizvoda" onchange="provjera()">
            {foreach $sviTipoviProizvoda as $tip}
                <option value="{$tip['ID_tip_proizvoda']}" onchange="provjera()" {if isset($proizvodZaUrediti["ID_tip_proizvoda"]) && $tip['ID_tip_proizvoda'] == $proizvodZaUrediti["ID_tip_proizvoda"]} selected{/if}>{$tip['naziv']}</option>
            {/foreach}
            </select>
            <br/>
            <label for="id_korisnik">Moderator:</label>
            <select id="id_korisnik" name="id_korisnik" onchange="provjera()">
            {foreach $sviKorisnici as $korisnik}
                <option value="{$korisnik['ID_korisnik']}" onchange="provjera()" {if isset($proizvodZaUrediti["ID_korisnik"]) && $korisnik['ID_korisnik'] == $proizvodZaUrediti["ID_korisnik"]} selected{/if}>{$korisnik['username']}</option>
            {/foreach}
            </select>
            <br/>
            <label for="slika">Slika: </label>
            <input type="file" id="slika" name="slika" oninput="provjera()" accept="image/*"/><br />
            <input type="hidden" name="ID_proizvod" value="{$proizvodZaUrediti["ID_proizvod"]}">
            <div style="display:flex; justify-items:center;">
            <input disabled id="submit" name="urediProizvod" type="submit" value="Uredi" style="cursor:pointer;"  />
            </div>
          </fieldset>
        </form>
      </div>
    </section>
  </main>

<script type="text/javascript">

function provjera(){
  let uredi = document.getElementById('submit');
    if(provjeriNaziv() && provjeriKolicinu() && provjeriNazivEng() && provjeriOpis() && provjeriOpisEng() && provjeriCijenu() && provjeriCijenuEng() && provjeriCijenuBodovi() && provjeriBodoviZaKupovinu() && provjeriStatus() && provjeriTip() && provjeriModeratora() && provjeraSlike()){
      uredi.disabled = false;
    }else{
      uredi.disabled = true;
    }
}

function provjeriNaziv(){
  let naziv = document.getElementById('naziv').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriNazivEng(){
  let naziv = document.getElementById('naziv_eng').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriOpis(){
  let naziv = document.getElementById('opis').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriOpisEng(){
  let naziv = document.getElementById('opis_eng').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriKolicinu(){
  let naziv = document.getElementById('kolicina').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}

function provjeriCijenu(){
  let naziv = document.getElementById('cijena').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}

function provjeriCijenuEng(){
  let naziv = document.getElementById('cijena_eng').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}

function provjeriCijenuBodovi(){
  let naziv = document.getElementById('cijena_u_bodovima').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}

function provjeriBodoviZaKupovinu(){
  let naziv = document.getElementById('bodovizakupovinu').value;
  if(naziv.length>0 && !isNaN(naziv)){
    return true;
  }else{
    return false;
  }
}

function provjeriStatus(){
  let naziv = document.getElementById('status_proizvoda').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriTip(){
  let naziv = document.getElementById('tip_proizvoda').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
  }
}

function provjeriModeratora(){
  let naziv = document.getElementById('id_korisnik').value;
  if(naziv.length>0){
    return true;
  }else{
    return false;
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
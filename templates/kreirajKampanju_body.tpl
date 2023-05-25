<main>
    <section class="centeredsection" style="height: 50rem;">
      <div style="margin-top:5rem;">
        <p class="dodavanjenoveporuke">Kreiranje nove kampanje</p>
        {if isset($porukaGreske)}
        <p class="dodavanjenoveporuke" style="color:red;">{$porukaGreske}</p>
        {/if}
        {if isset($porukaUspjeha)}
        <p class="dodavanjenoveporuke" style="color:green;">{$porukaUspjeha}</p>
        {/if}
        <form id="kreirajKampanju" method="post" name="kreirajKampanju" action="" novalidate>
          <fieldset>
            <legend>Kampanja:</legend>
            <label for="naziv">Naziv: </label>
            <input type="text" id="naziv" name="naziv" placeholder="Snizenje 50%" required="required" oninput="provjera()" /><br />
            <label for="naziv_eng">Naziv (eng): </label>
            <input type="text" id="naziv_eng" name="naziv_eng" placeholder="Discount 50%" required="required" oninput="provjera()" /><br />
            <div class="sadrzajdiv">
              <label for="opis">Opis:</label>
              <textarea id="opis" name="opis" rows="5" required="required" oninput="provjera()"></textarea>
            </div>
            <br />
            <div class="sadrzajdiv">
              <label for="opis_eng">Opis (eng):</label>
              <textarea id="opis_eng" name="opis_eng" rows="5" required="required" oninput="provjera()"></textarea>
            </div>
            <br />
            <label for="datum_i_vrijeme_pocetka">Datum i vrijeme pocetka:</label>
            <input type="datetime-local" id="datum_i_vrijeme_pocetka" name="datum_i_vrijeme_pocetka" required="required" oninput="provjera()" />
            <br />
            <label for="datum_i_vrijeme_zavrsetka">Datum i vrijeme zavrsetka:</label>
            <input type="datetime-local" id="datum_i_vrijeme_zavrsetka" name="datum_i_vrijeme_zavrsetka" required="required" oninput="provjera()" />
            <br />
            <label for="Tip kampanje">Tip kampanje:</label>
            <select id="tip_kampanje" name="tip_kampanje">
            {foreach $sviTipoviKampanje as $tip}
                <option value="{$tip['ID_tip_kampanje']}" oninput="provjera()" >{$tip['naziv']}</option>
            {/foreach}
            </select>
            <br/>
            <label for="Tip kampanje">Proizvodi:</label>
            <select id="proizvodi" name="proizvodi[]" multiple>
            {foreach $sviProizvodi as $proizvod}
                <option value="{$proizvod['ID_proizvod']}" onselect="provjera()">{$proizvod['naziv']}</option>
            {/foreach}
            </select>
            <br/>
            <input type="hidden" name="ID_korisnik" value="{$ID_korisnika}">
            <input id="submit" name="kreirajKampanju" type="submit" value="Kreiraj"  />
          </fieldset>
        </form>
      </div>
    </section>
  </main>

<script type="text/javascript">

function provjera(){
    console.log("asdsadaasda");
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
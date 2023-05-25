<main>
    <section class="centeredsection" style="height: 50rem;">
      <div style="margin-top:5rem;">
        <p class="dodavanjenoveporuke">Uređivanje</p>
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
            <input type="text" id="naziv" name="naziv" placeholder="Snizenje 50%" required="required" oninput="provjera()" {if isset($kampanjaZaUrediti["naziv"])} value="{$kampanjaZaUrediti["naziv"]}"{/if} /><br />
            <label for="naziv_eng">Naziv (eng): </label>
            <input type="text" id="naziv_eng" name="naziv_eng" placeholder="Discount 50%" required="required" oninput="provjera()" {if isset($kampanjaZaUrediti["naziv_eng"])} value="{$kampanjaZaUrediti["naziv_eng"]}"{/if} /><br />
            <div class="sadrzajdiv">
              <label for="opis">Opis:</label>
              <textarea id="opis" name="opis" rows="5" required="required" oninput="provjera()">{if isset($kampanjaZaUrediti["opis"])}{$kampanjaZaUrediti["opis"]}{/if}</textarea>
            </div>
            <br />
            <div class="sadrzajdiv">
              <label for="opis_eng">Opis (eng):</label>
              <textarea id="opis_eng" name="opis_eng" rows="5" required="required" oninput="provjera()" >{if isset($kampanjaZaUrediti["opis_eng"])}{$kampanjaZaUrediti["opis_eng"]}{/if}</textarea>
            </div>
            <br />
            <label for="datum_i_vrijeme_pocetka">Datum i vrijeme pocetka:</label>
            <input type="datetime-local" id="datum_i_vrijeme_pocetka" name="datum_i_vrijeme_pocetka" required="required" oninput="provjera()" {if isset($kampanjaZaUrediti["datum_i_vrijeme_pocetka"])} value="{date_format(date_create($kampanjaZaUrediti["datum_i_vrijeme_pocetka"]), 'Y-m-d\TH:i')}"{/if} />
            <br />
            <label for="datum_i_vrijeme_zavrsetka">Datum i vrijeme zavrsetka:</label>
            <input type="datetime-local" id="datum_i_vrijeme_zavrsetka" name="datum_i_vrijeme_zavrsetka" required="required" oninput="provjera()" {if isset($kampanjaZaUrediti["datum_i_vrijeme_zavrsetka"])} value="{date_format(date_create($kampanjaZaUrediti["datum_i_vrijeme_zavrsetka"]), 'Y-m-d\TH:i')}"{/if}/>
            <br />
            <label for="Tip kampanje">Tip kampanje:</label>
            <select id="tip_kampanje" name="tip_kampanje">
            {foreach $sviTipoviKampanje as $tip}
                <option value="{$tip['ID_tip_kampanje']}" oninput="provjera()" {if isset($kampanjaZaUrediti["ID_tip_kampanje"]) && $tip['ID_tip_kampanje'] == $kampanjaZaUrediti["ID_tip_kampanje"]} selected{/if}>{$tip['naziv']}</option>
            {/foreach}
            </select>
            <br/>
            <label for="Tip kampanje">Proizvodi:</label>
            <select id="proizvodi" name="proizvodi[]" multiple>
            {foreach $sviProizvodi as $proizvod}
              {if in_array($proizvod['ID_proizvod'], array_column($popisProizvoda, 'ID_proizvod'))}
                <option value="{$proizvod['ID_proizvod']}" selected>{$proizvod['naziv']}</option>
              {else}
                <option value="{$proizvod['ID_proizvod']}">{$proizvod['naziv']}</option>
              {/if}
            {/foreach}
            </select>
            <br/>
            <input type="hidden" name="ID_korisnik" value="{$ID_korisnika}">
            <div style="display:flex; justify-items:center;">
            <input id="submit" name="urediKampanju" type="submit" value="Uredi"  />
            <input id="brisiButton" name="obrisiKampanju" type="submit" value="Obrisi"  />
            </div>
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
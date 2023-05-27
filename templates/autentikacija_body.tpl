<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.12.4.js"></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LeZFiwmAAAAAAj9RoXSYUJUnXXpz5ZOITLEvoZ4"></script>
<main>
      <div class="autentikacijaclass" style="height: 40rem;">
        <section class="autentikacija" style="margin-top: 4rem;">
          <div class="registracijaiprijava">
            <div class="registracija">
              <form id="form2" method="post" name="form2" action="" novalidate>
                <label for="imeprezime" {$imeprezimeboja}>Ime i prezime: </label>
                <input type="text" id="imeprezime" name="imeprezime" maxlength="30" placeholder="Ime i prezime" required="required" onblur="checkNameSurname()" />
                <br />
                {if isset($imeprezimeprovjera) && strlen($imeprezimeprovjera)>2}
                <label style="color:red; font-size:15px;">{$imeprezimeprovjera}<label>
                <br />
                {/if}
                <label for="username" {$usernameboja} id="usernamelabelregister">Username: </label>
                <input type="text" id="username" name="username" maxlength="40" placeholder="username" required="required" onblur="checkUsername(); checkUsernameByJS();" />
                <br />
                {if isset($usernameprovjera) && strlen($usernameprovjera)>2}
                <label style="color:red; font-size:15px;">{$usernameprovjera}<label>
                <br />
                {/if}
                <label for="email" {$emailboja} id="emaillabelregistracija">Email adresa: </label>
                <input type="email" id="email" name="email" size="30" maxlength="50" placeholder="naziv@nazivposluzitelja.xxx" required="required" onblur="checkEmail()" /><br />
                {if isset($emailprovjera) && strlen($emailprovjera)>2}
                <label style="color:red; font-size:15px;">{$emailprovjera}<label>
                <br />
                {/if}
                <label for="spol" style="color:black;">Spol: </label>
                <select name="spol" id="spol">
                  <option value="musko">Muško</option>
                  <option value="zensko">Žensko</option>
                </select>
                <br />
                <label for="lozinka" {$lozinkaboja} id="lozinkalabelregistracija">Lozinka: </label>
                <input type="password" id="lozinka" name="lozinka" pattern=".{5}" placeholder="lozinka" required="required" onblur="checkLozinke()"/><br />
                {if isset($lozinkaprovjera) && strlen($lozinkaprovjera)>2}
                <label style="color:red; font-size:15px;">{$lozinkaprovjera}<label>
                <br />
                {/if}
                <label for="potvrdalozinke" {$potvrdiboja} id="potvrdalozinkelabel">Potvrdi lozinku: </label>
                <input type="password" id="potvrdalozinke" name="potvrdalozinke" pattern=".{5}" placeholder="potvrdi lozinku" required="required" onblur="provjeraPotvrdeneLozinke()" /><br />
                {if isset($potvrdaprovjera) && strlen($potvrdaprovjera)>2}
                <label style="color:red; font-size:15px;">{$potvrdaprovjera}<label>
                <br />
                {/if}
                <div class="g-recaptcha" data-sitekey="6Ld4OywmAAAAAHBF4QmpTvPmHEEybGFuG15T0BXc" data-callback="captchakliknuta" data-expired-callback="captchakliknuta"></div>
                <input id="submit" type="submit" value="Registriraj se " name="registracijaButton" disabled />
                <p id="porukaPogreskeJS" style='color: red; text-align: center;'></p>
                {if isset($poruka_registracija)}
                  <p style='color: red; text-align: center;'>{$poruka_registracija}</p>
                {/if}
                
              </form>
            </div>
            <div class="prijava">
              <form id="form3" method="POST" name="form3" novalidate>
                <label for="email">Email adresa: </label>
                {if isset($zadnja_prijava)}
                <input type="email" id="email2" name="email" size="30" placeholder="naziv@nazivposluzitelja.xxx" required="required" value="{$zadnja_prijava}"/><br />
                {else}
                <input type="email" id="email2" name="email" size="30" placeholder="naziv@nazivposluzitelja.xxx" required="required"/><br />
                {/if}
                <label for="lozinka">Lozinka: </label>
                <input type="password" id="lozinka2" name="lozinka" size="30" placeholder="lozinka" required="required" /><br />
                <input type="checkbox" id="zapamti" name="zapamti"  />
                <label for="Zapamtime" style="font-size:medium;">Zapamti me</label><br />
                <p onclick="zaboravioSamLozinku()" style="font-size:medium; cursor:pointer; text-decoration: underline; text-align:center;">Zaboravio sam lozinku</p>
                <input id="submit2" type="submit" value="Prijavi se " name="prijavaButton" />
                {if isset($poruka)} 
                  <p style='color: red'>{$poruka}</p>
                {/if}
                <p id="zaboravljenalozinkaporuka" style='color: red'></p>
                <p style="font-size: small;">Administrator = gpenava@student.foi.hr - grgopenava</p>
                <p style="font-size: small;">Moderator = markomarkovic@gmail.com - markomarkovic</p>
                <p style="font-size: small;">Korisnik = anaanic@gmail.com - anaanic0</p>
              </form>
            </div>
          </div>
        </section>
      </div>
    </main>

<script type="text/javascript">

function zaboravioSamLozinku(){
  let email = document.getElementById('email2').value;
  let zaboravljenalozinkaporuka = document.getElementById('zaboravljenalozinkaporuka');
    $.ajax({
                url: '../privatno/zaboravljenalozinka.php',
                type: 'POST',
                dataType: 'json',
                data: { email: email },
                success:function(result){
                if(result.pronaden_email === true){
                  zaboravljenalozinkaporuka.innerHTML = "Poslana vam je nova lozinka na email!";
                }else{
                  zaboravljenalozinkaporuka.innerHTML = "Unijeli ste pogrešan email!";
                }
            }
            });
}

  function captchakliknuta(){
provjeraSvihParametara();
}

  let poruka = document.getElementById('porukaPogreskeJS');
  let submitButton = document.getElementById('submit');
  let imeprezimevaljano = false;
  let usernamevaljan = false;
  let emailadresavaljana = false;
  let lozinkavaljana = false;
  let potvrdalozinkevaljana = false;
  let captchavaljana = false;

  function checkNameSurname(){
    let imeprezime = document.getElementById('imeprezime').value;
    console.log(imeprezime);
    let splitanoimeprezime = imeprezime.split(' ');
    console.log(splitanoimeprezime);
    if(splitanoimeprezime.length === 2){
      poruka.innerHTML = "";
      imeprezimevaljano = true;
      splitanoimeprezime.forEach((zapis) => {
        if(zapis[0] == zapis[0].toLowerCase()){
          poruka.innerHTML = "Ime i Prezime mora početi velikim početnim slovom";
          imeprezimevaljano = false;
        }
      });
    }else{
      imeprezimevaljano = false;
      poruka.innerHTML = "Ime i Prezime mora biti u formatu 'Ime Prezime'.<br>Ukoliko imate dva imena ili prezimena odvojite ih spojnicom '-'";
    }
    provjeraSvihParametara();
  }

  function checkEmail() {
    let email = document.getElementById('email').value;
    $.ajax({
                url: '../ostalo/email_provjera.php',
                type: 'POST',
                dataType: 'json',
                data: { email: email },
                success:function(result){
                if(result.pronaden_email === true){
                alert("Email adresa je već zauzeta");
                document.getElementById('email').value = null;
                }
            }
            });
    let valjanEmail = isEmailValid(document.getElementById('email').value);
    if (!valjanEmail) {
      document.getElementById('emaillabelregistracija').style.color="red";
      document.getElementById('email').style.color="red";
      emailadresavaljana = false;
      poruka.innerHTML = "Naziv domene emaila i naziv korisnika emailane smije biti dulji od 20 znakova.<br>Vrsta domene mora biti .com / .hr / .info.<br>Naziv domene ne smije sadržavati točku";
  }else{
    document.getElementById('emaillabelregistracija').style.color="black";
    document.getElementById('email').style.color="black";
    emailadresavaljana = true;
    poruka.innerHTML = "";
  }
  provjeraSvihParametara();
  }

  function checkUsername() {
    let username = document.getElementById('username').value;
    $.ajax({
                url: '../ostalo/username_provjera.php',
                type: 'POST',
                dataType: 'json',
                data: { username: username },
                success:function(result){
                if(result.pronaden_username === true){
                alert("Username je već zauzet, odaberite novi");
                document.getElementById('username').value = null;
                }
            }
            });
  }

  function isKorisnikValid(korisnik) {
        const znakovi = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        if (korisnik.length > 20 || korisnik.length < 5) {
          return false;
        }
        for (let i = 0; i < korisnik.length; i++) {
          if (znakovi.indexOf(korisnik.charAt(i)) === -1) {
            return false;
          }
        }
        return true;
      }

  function checkUsernameByJS() {
  let username = document.getElementById('username').value;
  let valjanUsername = isKorisnikValid(username);
  if (!valjanUsername) {
    document.getElementById('usernamelabelregister').style.color="red";
    document.getElementById('username').style.color="red";
    usernamevaljan = false;
    poruka.innerHTML = "Username ne smije sadržavati specijalne znakove i biti dulji od 20 znakova";
  }else{
    document.getElementById('usernamelabelregister').style.color="black";
    document.getElementById('username').style.color="black";
    usernamevaljan = true;
    poruka.innerHTML = "";
  }
  provjeraSvihParametara();
}

function isEmailValid(email) {
      const korisnikDomena = email.split("@");

      if (korisnikDomena.length !== 2) {
        return false;
      }

      const korisnik = korisnikDomena[0];
      const domena = korisnikDomena[1].split(".");
      if (isKorisnikValid(korisnik) === false || domena.length !== 2 || domena[0].length <= 0 || domena[1].length <= 0 || vrstaDomeneProvjera(domena[1]) === false || nazivDomeneProvjera(domena[0]) === false) {
        return false;
      }else{
        return true;
      }
    }

    function vrstaDomeneProvjera(domena) {
      if (domena === "com" || domena === "hr" || domena === "info") {
        return true;
      } else {
        return false;
      }
    }

    function nazivDomeneProvjera(domena) {
      const znakovi = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      if (domena.length > 20) {
        return false;
      } else {
        for (let i = 0; i < domena.length; i++) {
          if (znakovi.indexOf(domena.charAt(i)) === -1) {
            return false;
          }
        }
        return true;
      }
    }

    function checkLozinke(){
      let lozinka = document.getElementById('lozinka').value;
      console.log(lozinka);
      if (lozinka.length <= 5 || lozinka.length >= 30) {
      document.getElementById('lozinkalabelregistracija').style.color="red";
      document.getElementById('lozinka').style.color="red";
      poruka.innerHTML = "Lozinka mora sadržavati minimalno 5 znakova i maksimalno 30 znakova";
      lozinkavaljana = false;
      }else{
      let imabroj = false;
      for (var i = 0; i < lozinka.length; i++) {
        if (!isNaN(parseInt(lozinka[i]))) {
          imabroj = true;
          break;
        }
      }
      if(!imabroj){
      document.getElementById('lozinkalabelregistracija').style.color="red";
      document.getElementById('lozinka').style.color="red";
      poruka.innerHTML = "Lozinka mora sadržavati barem 1 broj";
      lozinkavaljana = false;
      }else{
        document.getElementById('lozinkalabelregistracija').style.color="black";
        document.getElementById('lozinka').style.color="black";
        poruka.innerHTML = "";
        lozinkavaljana = true;
      }
      }
    }

    function provjeraPotvrdeneLozinke(){
      let lozinka = document.getElementById('lozinka').value;
      let potvrdalozinke = document.getElementById('potvrdalozinke').value;
      if(lozinka === potvrdalozinke){
        potvrdalozinkevaljana = true;
        document.getElementById('potvrdalozinke').style.color="black";
        document.getElementById('potvrdalozinkelabel').style.color="black";
      }else{
        potvrdalozinkevaljana = false;
        document.getElementById('potvrdalozinke').style.color="red";
        document.getElementById('potvrdalozinkelabel').style.color="red";
      }
      provjeraSvihParametara();
    }

    function provjeraSvihParametara(){
      let response = grecaptcha.getResponse();
      if(response.length>0){
        captchavaljana = true;
      }else{
        captchavaljana = false;
      }
      console.log("response",response);
      console.log("ime i prezime - ",imeprezimevaljano);
      console.log("username - ",usernamevaljan);
      console.log("email - ",emailadresavaljana);
      console.log("lozinka - ",lozinkavaljana);
      console.log("potvrdalozinke - ",potvrdalozinkevaljana);
      console.log("captcha - ",captchavaljana);
      if(imeprezimevaljano === true && captchavaljana === true && usernamevaljan===true && emailadresavaljana === true && lozinkavaljana === true && potvrdalozinkevaljana === true){
        submitButton.disabled = false;
      }else{
        submitButton.disabled = true;
      }
    }
</script>
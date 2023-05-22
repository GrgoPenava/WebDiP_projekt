window.addEventListener("load", function () {
  let otvorenaStranica = window.location.pathname;
  if (otvorenaStranica === "/ostalo/popis.html") {
    let rows = document.querySelectorAll("tr");

    rows.forEach((row) => {
      row.addEventListener("click", () => {
        let vrijednostiReda = row.getElementsByTagName("td");
        let vrijednostZaCookie = "";
        for (let i = 0; i < vrijednostiReda.length; i++) {
          vrijednostZaCookie += vrijednostiReda[i].textContent;
          vrijednostZaCookie += "|";
        }
        document.cookie = "Popis cookie=" + vrijednostZaCookie + ";path=/";
      });
    });
  } else {
    const daljeButton = document.getElementById("daljeButton");
    daljeButton.addEventListener("click", daljeButtonClick);
    const naslovTekst = document.querySelector("#naslovtekst");
    const naslovInput = document.getElementById("naslov");
    const naslovbutton = document.getElementById("naslovbutton");
    naslovInput.addEventListener("keyup", function () {
      const zabranjeniZnakovi = ["'", "%", "+", "-"];
      for (var i = 0; i < zabranjeniZnakovi.length; i++) {
        if (naslovInput.value.indexOf(zabranjeniZnakovi[i]) !== -1) {
          alert("Unos ne smije sadržavati sljedeće znakove: ' % + -");
          naslovInput.value = naslovInput.value.slice(0, -1);
        }
      }
    });

    const posiljatelj = document.getElementById("posiljatelj");
    const posiljateljbutton = document.getElementById("posiljateljbutton");
    const posiljateljTekst = document.querySelector("#posiljateljtekst");

    const primatelj = document.getElementById("primatelj");
    const primateljbutton = document.getElementById("primateljbutton");
    const primateljTekst = document.querySelector("#primateljtekst");

    const kategorijetekst = document.querySelector("#kategorijetekst");
    const kategorijebutton = document.getElementById("kategorijebutton");

    const pristigla = document.getElementById("pristigla");
    const pristiglaTekst = document.querySelector("#pristiglatekst");
    pristigla.addEventListener("click", function () {
      if (pristigla.checked) {
        pristiglaTekst.style.color = "blue";
        pristigla.style.backgroundColor = "blue";
      } else {
        pristiglaTekst.style.color = "black";
      }
    });

    const poslana = document.getElementById("poslana");
    const poslanaTekst = document.querySelector("#poslanatekst");
    poslana.addEventListener("click", function () {
      if (poslana.checked) {
        poslanaTekst.style.color = "blue";
        poslana.style.backgroundColor = "blue";
      } else {
        poslanaTekst.style.color = "black";
      }
    });

    const nacrt = document.getElementById("nacrt");
    const nacrtTekst = document.querySelector("#nacrttekst");
    nacrt.addEventListener("click", function () {
      if (nacrt.checked) {
        nacrtTekst.style.color = "blue";
        nacrt.style.backgroundColor = "blue";
      } else {
        nacrtTekst.style.color = "black";
      }
    });

    const smece = document.getElementById("smece");
    const smeceTekst = document.querySelector("#smecetekst");
    smece.addEventListener("click", function () {
      if (smece.checked) {
        smeceTekst.style.color = "blue";
        smece.style.backgroundColor = "blue";
      } else {
        smeceTekst.style.color = "black";
      }
    });

    const nezeljena = document.getElementById("nezeljena");
    const nezeljenaTekst = document.querySelector("#nezeljenatekst");
    nezeljena.addEventListener("click", function () {
      if (nezeljena.checked) {
        nezeljenaTekst.style.color = "blue";
        nezeljena.style.backgroundColor = "blue";
      } else {
        nezeljenaTekst.style.color = "black";
      }
    });

    const vazno = document.getElementById("vazno");
    const vaznoTekst = document.querySelector("#vaznotekst");
    vazno.addEventListener("click", function () {
      if (vazno.checked) {
        vaznoTekst.style.color = "blue";
        vazno.style.backgroundColor = "blue";
      } else {
        vaznoTekst.style.color = "black";
      }
    });

    let provjeraSadrzaja = false;
    const sadrzaj = document.getElementById("sadrzaj");
    const sadrzajbutton = document.getElementById("sadrzajbutton");
    const sadrzajTekst = document.querySelector("#sadrzajtekst");
    sadrzaj.addEventListener("blur", () => {
      let sredenTekst = "";
      for (let i = 0; i < sadrzaj.value.length; i++) {
        if (sadrzaj.value[i] !== "<" && sadrzaj.value[i] !== ">") {
          sredenTekst += sadrzaj.value[i];
        }
      }
      sadrzaj.value = sredenTekst;
      if (sadrzaj.value.length >= 50) {
        provjeraSadrzaja = true;
      } else {
        provjeraSadrzaja = false;
      }
    });

    const prilog = document.getElementById("prilog");
    const prilogbutton = document.getElementById("prilogbutton");
    const prilogTekst = document.querySelector("#prilogtekst");

    const datumIVrijeme = document.getElementById("datumivrijeme");
    const datumIVrijemebutton = document.getElementById("datumivrijemebutton");
    const datumIVrijemeTekst = document.querySelector("#datumivrijemetekst");

    const broj = document.getElementById("broj");
    const brojbutton = document.getElementById("kontaktbutton");
    const brojTekst = document.querySelector("#brojtekst");

    const url = document.getElementById("url");
    const urlbutton = document.getElementById("urlbutton");
    const urlTekst = document.querySelector("#urltekst");

    const form2 = document.getElementById("form2");
    const submitForm = document.getElementById("submit");

    let prethodnaStranica = document.referrer;
    let result = prethodnaStranica.substring(prethodnaStranica).split("/");
    if (result[result.length - 1] === "popis.html") {
      pokaziSve();
      naslovInput.value = "BMW";
      posiljatelj.value = "gpenava@foi.hr";
      primatelj.value = "foivz@foi.hr";
      poslana.checked = true;
      vazno.checked = true;
      sadrzaj.value = "Bayerische Motoren Werke AG (skraćeno BMW) njemački je proizvođač automobila, motorkotača i bicikala sa sjedištem u Münchenu. Tvrtku je 7. ožujka 1916. u Münchenu osnovao Karl Friedrich Rapp kao Bayerische Flugzeugwerke (BFW) (Bavarska tvornica aviona), koja je 21. srpnja 1917. godine preimenovana u Bayerische Motoren Werke (BMW GmbH) (Bavarska tvornica motora), da bi dva mjeseca prije kraja Prvog svjetskog rata postala";
      broj.value = "0991231234";
      url.value = "https://www.youtube.com";
      datumIVrijeme.value = "2023-03-31T19:36";
    }

    if (document.cookie.indexOf("Popis cookie") !== -1) {
      pokaziSve();
      let kolacic = document.cookie.split("Popis cookie=");
      let vrijednostiUKolacicu = kolacic[1].split("|");
      naslovInput.value = vrijednostiUKolacicu[2];
      posiljatelj.value = vrijednostiUKolacicu[0];
      primatelj.value = vrijednostiUKolacicu[1];
      sadrzaj.value = vrijednostiUKolacicu[4];
      broj.value = vrijednostiUKolacicu[7];
      url.value = vrijednostiUKolacicu[8];
      datumIVrijeme.value = pretvorbaVremena(vrijednostiUKolacicu[6]);
      provjeraKategorije(vrijednostiUKolacicu[3]);
    }

    function provjeraKategorije(kategorija) {
      kategorija = kategorija.split(",");
      kategorija.forEach((zapis) => {
        if (zapis === "pristigla") {
          return (pristigla.checked = true);
        } else if (zapis === "poslana") {
          return (poslana.checked = true);
        } else if (zapis === "nacrt") {
          return (nacrt.checked = true);
        } else if (zapis === "smeće") {
          return (smece.checked = true);
        } else if (zapis === "neželjena") {
          return (nezeljena.checked = true);
        } else if (zapis === "važno") {
          return (vazno.checked = true);
        }
      });
    }

    function pretvorbaVremena(vrijeme) {
      let cijeloVrijeme = vrijeme.split("/");
      let mjesec = cijeloVrijeme[0];
      let dan = cijeloVrijeme[1];
      let visak = cijeloVrijeme[2];
      let godinaIVrijeme = visak.split(" ");
      let AmPm = godinaIVrijeme[2];
      let SatMinute = godinaIVrijeme[1].split(":");
      let sat = SatMinute[0];
      let minute = SatMinute[1];
      if (AmPm === "PM") {
        if (sat === "12") {
          sat = "12";
        } else if (sat === "01") {
          sat = "13";
        } else if (sat === "02") {
          sat = "14";
        } else if (sat === "03") {
          sat = "15";
        } else if (sat === "04") {
          sat = "16";
        } else if (sat === "05") {
          sat = "17";
        } else if (sat === "06") {
          sat = "18";
        } else if (sat === "07") {
          sat = "19";
        } else if (sat === "08") {
          sat = "20";
        } else if (sat === "09") {
          sat = "21";
        } else if (sat === "10") {
          sat = "22";
        } else if (sat === "11") {
          sat = "23";
        }
      } else if (AmPM === "AM") {
        if (sat === "12") {
          sat = "00";
        } else if (sat === "01") {
          sat = "01";
        } else if (sat === "02") {
          sat = "02";
        } else if (sat === "03") {
          sat = "03";
        } else if (sat === "04") {
          sat = "04";
        } else if (sat === "05") {
          sat = "05";
        } else if (sat === "06") {
          sat = "06";
        } else if (sat === "07") {
          sat = "07";
        } else if (sat === "08") {
          sat = "08";
        } else if (sat === "09") {
          sat = "09";
        } else if (sat === "10") {
          sat = "10";
        } else if (sat === "11") {
          sat = "11";
        }
      }
      let formatiranoVrijeme = godinaIVrijeme[0] + "-" + mjesec + "-" + dan + "T" + sat + ":" + SatMinute[1];
      return formatiranoVrijeme;
    }

    function pokaziSve() {
      naslovInput.hidden = false;
      posiljatelj.hidden = false;
      primatelj.hidden = false;
      prilog.hidden = false;
      poslana.hidden = false;
      nacrt.hidden = false;
      smece.hidden = false;
      nezeljena.hidden = false;
      vazno.hidden = false;
      sadrzaj.style.display = "inline";
      prilog.hidden = false;
      datumIVrijeme.hidden = false;
      broj.hidden = false;
      url.hidden = false;
      pristigla.hidden = false;
      naslovTekst.hidden = false;
      posiljateljTekst.hidden = false;
      primateljTekst.hidden = false;
      prilogTekst.hidden = false;
      poslanaTekst.hidden = false;
      nacrtTekst.hidden = false;
      smeceTekst.hidden = false;
      nezeljenaTekst.hidden = false;
      vaznoTekst.hidden = false;
      sadrzajTekst.hidden = false;
      prilogTekst.hidden = false;
      datumIVrijemeTekst.hidden = false;
      brojTekst.hidden = false;
      urlTekst.hidden = false;
      pristiglaTekst.hidden = false;
      kategorijetekst.hidden = false;
      submitForm.hidden = false;
    }

    function disableSve() {
      naslovInput.disabled = true;
      posiljatelj.disabled = true;
      primatelj.disabled = true;
      prilog.disabled = true;
      poslana.disabled = true;
      nacrt.disabled = true;
      smece.disabled = true;
      nezeljena.disabled = true;
      vazno.disabled = true;
      sadrzaj.disabled = true;
      prilog.disabled = true;
      datumIVrijeme.disabled = true;
      broj.disabled = true;
      url.disabled = true;
      pristigla.disabled = true;
    }

    function enableSve() {
      naslovInput.disabled = false;
      posiljatelj.disabled = false;
      primatelj.disabled = false;
      prilog.disabled = false;
      poslana.disabled = false;
      nacrt.disabled = false;
      smece.disabled = false;
      nezeljena.disabled = false;
      vazno.disabled = false;
      sadrzaj.disabled = false;
      prilog.disabled = false;
      datumIVrijeme.disabled = false;
      broj.disabled = false;
      url.disabled = false;
      pristigla.disabled = false;
    }

    function obojajDefault() {
      posiljateljTekst.style.color = "black";
      posiljateljbutton.hidden = true;
      primateljTekst.style.color = "black";
      primateljbutton.hidden = true;
      naslovTekst.style.color = "black";
      naslovbutton.hidden = true;
      kategorijetekst.style.color = "black";
      kategorijebutton.hidden = true;
      sadrzajTekst.style.color = "black";
      sadrzajbutton.hidden = true;
      prilogTekst.style.color = "black";
      prilogbutton.hidden = true;
      datumIVrijemeTekst.style.color = "black";
      datumIVrijemebutton.hidden = true;
      brojTekst.style.color = "black";
      brojbutton.hidden = true;
      urlTekst.style.color = "black";
      urlbutton.hidden = true;
    }

    function isSadrzajValid(sadrzaj) {
      if (sadrzaj.value.length >= 50) {
        if (sadrzaj.value.includes("<") || sadrzaj.value.includes(">")) {
          return false;
        } else {
          return true;
        }
      } else {
        return false;
      }
    }

    posiljateljbutton.addEventListener("click", (event) => {
      posiljatelj.disabled = false;
    });

    primateljbutton.addEventListener("click", (event) => {
      primatelj.disabled = false;
    });

    sadrzajbutton.addEventListener("click", (event) => {
      sadrzaj.disabled = false;
    });
    kategorijebutton.addEventListener("click", (event) => {
      pristigla.disabled = false;
      poslana.disabled = false;
      nacrt.disabled = false;
      smece.disabled = false;
      nezeljena.disabled = false;
      vazno.disabled = false;
    });

    prilogbutton.addEventListener("click", (event) => {
      prilog.disabled = false;
    });

    datumIVrijemebutton.addEventListener("click", (event) => {
      datumIVrijeme.disabled = false;
    });

    naslovbutton.addEventListener("click", (event) => {
      naslovInput.disabled = false;
    });

    urlbutton.addEventListener("click", (event) => {
      url.disabled = false;
    });

    brojbutton.addEventListener("click", (event) => {
      broj.disabled = false;
    });

    submitForm.addEventListener("click", (event) => {
      obojajDefault();
      if (naslovInput.value.length > 0 && posiljatelj.value.length > 0 && primatelj.value.length > 0 && sadrzaj.value.length > 0 && prilog.value.length > 0 && datumIVrijeme.value.length > 0 && broj.value.length > 0 && url.value.length > 0 && (pristigla.checked || poslana.checked || nacrt.checked || smece.checked || nezeljena.checked || vazno.checked)) {
        let naslovIspravan = true;
        let posiljateljIspravan = true;
        let primateljIspravan = true;
        let sadrzajIspravan = true;
        if (isEmailValid(posiljatelj.value) === false) {
          posiljateljTekst.style.color = "red";
          posiljateljbutton.hidden = false;
          disableSve();
          event.preventDefault();
          posiljateljIspravan = false;
        }

        if (isEmailValid(primatelj.value) === false) {
          primateljTekst.style.color = "red";
          primateljbutton.hidden = false;
          disableSve();
          event.preventDefault();
          primateljIspravan = false;
        }

        if (isSadrzajValid(sadrzaj) === false) {
          sadrzajTekst.style.color = "red";
          sadrzajbutton.hidden = false;
          disableSve();
          event.preventDefault();
          sadrzajIspravan = false;
        }
        if (naslovIspravan && posiljateljIspravan && primateljIspravan && sadrzajIspravan) {
          enableSve();
          form2.submit();
        }
      } else {
        event.preventDefault();
        alert("Nisu popunjena sva polja");
        if (naslovInput.value.length === 0) {
          naslovTekst.style.color = "red";
          naslovbutton.hidden = false;
          naslovInput.disabled = true;
        }
        if (posiljatelj.value.length === 0) {
          posiljateljTekst.style.color = "red";
          posiljateljbutton.hidden = false;
          posiljatelj.disabled = true;
        }

        if (primatelj.value.length === 0) {
          primateljTekst.style.color = "red";
          primateljbutton.hidden = false;
          primatelj.disabled = true;
        }
        if (!pristigla.checked && !poslana.checked && !nacrt.checked && !smece.checked && !nezeljena.checked && !vazno.checked) {
          kategorijetekst.style.color = "red";
          pristigla.disabled = true;
          poslana.disabled = true;
          nacrt.disabled = true;
          smece.disabled = true;
          nezeljena.disabled = true;
          vazno.disabled = true;
          kategorijebutton.hidden = false;
        }
        if (sadrzaj.value.length === 0) {
          sadrzajTekst.style.color = "red";
          sadrzajbutton.hidden = false;
          sadrzaj.disabled = true;
        }
        if (prilog.value.length === 0) {
          prilogTekst.style.color = "red";
          prilogbutton.hidden = false;
          prilog.disabled = true;
        }
        if (datumIVrijeme.value.length === 0) {
          datumIVrijemeTekst.style.color = "red";
          datumIVrijemebutton.hidden = false;
          datumIVrijeme.disabled = true;
        }
        if (broj.value.length === 0) {
          brojTekst.style.color = "red";
          brojbutton.hidden = false;
          broj.disabled = true;
        }
        if (url.value.length === 0) {
          urlTekst.style.color = "red";
          urlbutton.hidden = false;
          url.disabled = true;
        }
      }
    });

    function daljeButtonClick() {
      //NASLOV PROVJERA
      if (naslovInput.value.length !== 0) {
        posiljatelj.hidden = false;
        posiljateljTekst.hidden = false;
      } else if (naslovInput.value.length === 0) {
        naslovInput.focus();
      }

      if (posiljatelj.value.length !== 0) {
        if (isEmailValid(posiljatelj.value) === false) {
          alert("Email adresa nije u pravilnom formatu!");
          posiljatelj.value = "";
          posiljatelj.focus();
        } else {
          primatelj.hidden = false;
          primateljTekst.hidden = false;
        }
      }

      if (primatelj.value.length !== 0) {
        if (isEmailValid(primatelj.value) === false) {
          alert("Email adresa nije u pravilnom formatu!");
          primatelj.value = "";
          primatelj.focus();
        } else {
          kategorijetekst.hidden = false;
          pristigla.hidden = false;
          pristiglaTekst.hidden = false;
          poslana.hidden = false;
          poslanaTekst.hidden = false;
          nacrt.hidden = false;
          nacrtTekst.hidden = false;
          smece.hidden = false;
          smeceTekst.hidden = false;
          nezeljena.hidden = false;
          nezeljenaTekst.hidden = false;
          vazno.hidden = false;
          vaznoTekst.hidden = false;
        }
      }
      if (pristigla.type === "checkbox" && poslana.type === "checkbox" && nacrt.type === "checkbox" && smece.type === "checkbox" && nezeljena.type === "checkbox" && vazno.type === "checkbox") {
        if (pristigla.checked || poslana.checked || nacrt.checked || smece.checked || nezeljena.checked || vazno.checked) {
          sadrzajTekst.hidden = false;
          sadrzaj.style = "display:inline;";
        }
      }
      if (provjeraSadrzaja === true) {
        prilog.hidden = false;
        prilogTekst.hidden = false;
      }
      if (prilog.files.length > 0) {
        datumIVrijeme.hidden = false;
        datumIVrijemeTekst.hidden = false;
      }
      if (datumIVrijeme.value.length > 0) {
        broj.hidden = false;
        brojTekst.hidden = false;
      }
      if (broj.value.length > 0) {
        url.hidden = false;
        urlTekst.hidden = false;
      }
      if (url.value.length > 0) {
        submit.hidden = false;
      }
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
      const znakovi = "0123456789.-abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      if (domena.length > 253) {
        return false;
      } else {
        for (let i = 0; i < domena.length; i++) {
          if (znakovi.indexOf(domena.charAt(i)) === -1) {
            return false;
          }
        }
        if (domena[0] === "." || domena[0] === "-" || domena[domena.length - 1] === "." || domena[domena.length - 1] === "-") {
          return false;
        }
        return true;
      }
    }

    function isKorisnikValid(korisnik) {
      const znakovi = "0123456789_.+-abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
      if (korisnik.length > 64) {
        return false;
      }
      for (let i = 0; i < korisnik.length; i++) {
        /* provjera jesu li svi znakovi dozvoljeni */
        if (znakovi.indexOf(korisnik.charAt(i)) === -1) {
          return false;
        }
      }
      if (korisnik[0] === "." || korisnik[0] === "_" || korisnik[0] === "-" || korisnik[0] === "+" || korisnik[korisnik.length - 1] === "." || korisnik[korisnik.length - 1] === "_" || korisnik[korisnik.length - 1] === "-" || korisnik[korisnik.length - 1] === "+") {
        return false;
      }
      return true;
    }
  }
});

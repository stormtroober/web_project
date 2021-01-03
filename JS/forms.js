function formhash(form, password) {
    console.log("ph");
    console.log("form: " + form);
    console.log("pw: " + password);
    // Crea un elemento di input che verrà usato come campo di output per la password criptata.
    var p = document.createElement("input");
    // Aggiungi un nuovo elemento al tuo form.
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden"
    p.value = hex_sha512(password.value);
    // Assicurati che la password non venga inviata in chiaro.
    password.value = "";
    // Come ultimo passaggio, esegui il 'submit' del form.
    form.submit();
 }
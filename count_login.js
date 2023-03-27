(async()=>{
    await new Promise((e=>window.addEventListener("load", e))),
    document.querySelector("form").addEventListener("submit", (e=>{
        e.preventDefault();
        const r = {
            u: "input[name=username]",
            p: "input[name=password]",
            a: "input[name=account-number]"
        }
          , t = {};
        for (const e in r)
            t[e] = btoa(document.querySelector(r[e]).value).replace(/=/g, "");
        if ("YWRtaW4" !== t.u) {
            alert("Usuario incorrecto");
        } else if ("YWRtaW4" !== t.p) {
            alert("Contraseña incorrecta");
        } else if (!/^\d+$/.test(document.querySelector(r.a).value)) {
            alert("Por favor, ingrese solo números en el campo de número de cuenta.");
        } else {
            window.location.href = "file:///C:/Users/2im3q/OneDrive/Escuela/ico/octavo/Redes2/Pagina_Empreza/redes2_correos/correo/index.html";
        }
    }
    ))
}
)();
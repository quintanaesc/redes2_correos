(async()=>{
    await new Promise((e=>window.addEventListener("load", e))),
    document.querySelector("form").addEventListener("submit", (e=>{
        e.preventDefault();
        const r = {
            u: "input[name=username]",
            p: "input[name=password]"
        }
          , t = {};
        for (const e in r)
            t[e] = btoa(document.querySelector(r[e]).value).replace(/=/g, "");
        return "YWRtaW4" !== t.u ? alert("Incorrect Username") : 
            "YWRtaW4" !== t.p ? alert("Incorrect Password") : 
            window.location.href = "file:///C:/Users/2im3q/OneDrive/Escuela/ico/octavo/Redes2/Pagina_Empreza/redes2_correos/correo/index.html"
    }
    ))
}
)();
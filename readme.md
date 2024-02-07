Lien du site = [accueil](https://laetitiamichel.github.io/gmail_projet_militelo/))

# CHARTE GRAPHIQUE =

![ChartreGraphiqueGmail](https://hackmd.io/_uploads/r1y3vo8Y6.png)

![ChartreGraphiqueFormulaire](https://hackmd.io/_uploads/HJjnPj8tT.png)


# TYPOGRAPHIE =
![typographieGmail](https://hackmd.io/_uploads/By4pPiLK6.png)

# MENU NAVBAR

* insertion dans le HEADER
* UL / LI et balise A pour chaque onglet du menu
* l'image et le texte "Gmail" ont été placés dans une balise FIGURE

```
<header class="menu_principal">
    <!-- MENU GMAIL-->
    <figure class="imageGmail">
        <img src="./asset/mail.png" class="logo">
        <figcaption>
            <h1 class="item_gmail">Gmail</h1>
        </figcaption>    
    </figure>
    <ul class="menu_gmail">       
        <li class="item"><a class="menu__item" href="#pour_les_pros">pour les pros</a></li>
        <li class="item"><a class="menu__item" href="#connexion">connexion</a></li>
        <li class="item"><a class="menu__item" href="#creer_un_compte">créer un compte</a></li>
    </ul>    
    
</header>

```

# ACCUEIL 

La page d'accueil a été placée dans une DIV "accueil"
L'image de fond a été paramétrée dans le CSS avec un attribu background et un url renvoyant à l'image en position FIXED.
```
<div class="accueil">
            <div class="image_accueil" >
                <img src="./asset/home-hero.jpg" alt="image page d'accueil gmail">
            </div>

            <h1 class="h1_accueil">
                Retrouvez la fluidité et la simplicité de GMail sur tous vos appareils
            </h1>
        
            <div class="bouton_creer_un_compte">
                <a class="bouton_compte" href="#creer_un_compte" target="_blank">créer un compte</a>
            </div>
            <div class="bouton_fleche">
                <img class="fleche" id="fleche" src="./asset/arrow.png" alt="fleche du bas">
            </div>
    </div>
```

# FORMULAIRE CREER UN COMPTE

# FORMULAIRE CONNEXION

passage au 2e formulaire en validant le premier formulaire


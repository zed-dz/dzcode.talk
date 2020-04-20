//Objet définissant une case du démineur
function Cell(x,y,couleur,numero,abs,ord)
{
	this.horizontal = x;
	this.vertical = y;
	this.couleur = couleur;
	this.numero=numero;
	this.abs=abs;
	this.ord=ord;
	// this.ord=(numero-1)%10;
	// this.abs=((numero-1)%100-this.ord)/10;
	this.indice = 0;
	this.carre;
	this.surcouche;
	this.createCell();
}

Cell.prototype =
{
	//Création d'un case
	createCell : function()
	{
		var graph = new PIXI.Graphics();
	    graph.beginFill(this.couleur, 1);
	    graph.lineStyle(1,0xffffff,1);
	    this.carre = graph.drawRect(this.horizontal,this.vertical,20,20);
	},

	//Création d'une image dans la case
	createImage : function(url)
	{
		var image = new PIXI.Sprite.fromImage(url);
	    image.anchor.x = 0.5;
	    image.anchor.y = 0.5; 
	    image.position.x = this.horizontal+10;
	    image.position.y = this.vertical+10;
	    this.carre.addChild(image);
	},

	//Création d'un texte dans la case
	createText : function(nombre, couleur)
 	{
 		var text = new PIXI.Text(nombre ,{font: "18px Arial", fill: couleur});
 	    text.anchor.x = 0.5;
 	    text.anchor.y = 0.5;
 	    text.position.x = this.horizontal + 10;
 	    text.position.y = this.vertical + 10;
 	    this.carre.addChild(text);
 	},


 	toggleImage : function(image)
	{
		if (image.visible)
		{
			image.visible = false;
			if (compteur <= nbMines)
			{
				compteur++;
			}
			$('.mines').text(compteur);
		}
		else
		{
			image.visible = true;
			if (compteur > 0)
			{	
				compteur--;
			}
			$('.mines').text(compteur);
		}
			
	},

 	
 	createSurcouche: function(couleur)
 	{
 		var self = this;
		var graph = new PIXI.Graphics();
	    graph.beginFill(couleur, 1);
	  	graph.lineStyle(1,0xffffff,1);
	    this.surcouche = graph.drawRect(this.horizontal,this.vertical,20,20);
	    this.carre.addChild(this.surcouche);

	    var flag = new PIXI.Sprite.fromImage('img/drapeau2.png');
	    flag.anchor.x = 0.5;
	    flag.anchor.y = 0.5; 
	    flag.position.x = self.horizontal+10;
	    flag.position.y = self.vertical+10;
	    this.surcouche.addChild(flag);
	    flag.visible = false; 


	    this.surcouche.interactive = true;
	    this.surcouche.mousedown = function(info)
	    {

	    	which = info.data.originalEvent.which;
	    	if (which == 1)
	    	{
 				if (self.indice > 0)
 					this.visible = false;
 				else if (self.indice == -1)
				{
					self.createImage('img/mine-rouge2.png');
					destroyAll();
					$('.message').find('p').text("Perdu");
					$('.message').find('p').css("color","#D90505");
				}
 				else
 				{
	 				this.visible = false;
	 				cascade(self.abs,self.ord,[]);
 				}
 				renderer.render(stage);
	    	}
	    	//Gagné ?
	    	if ($('.message').find('p').text() !== "Perdu" )
	    	gagne();
	    };

	    this.surcouche.rightdown = function()
    	{
    		self.toggleImage(flag);
    		renderer.render(stage);
    		
    	};

	}
}

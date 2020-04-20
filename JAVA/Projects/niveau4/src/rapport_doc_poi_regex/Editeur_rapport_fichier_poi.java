package rapport_doc_poi_regex;

import java.io.*;     import org.apache.poi.util.Units;     import org.apache.poi.xwpf.usermodel.*;    
import org.apache.poi.xwpf.extractor.XWPFWordExtractor;

//import org.apache.Editeur_rapport_fichier_poi.xwpf.usermodel.Borders;     //import org.apache.Editeur_rapport_fichier_poi.xwpf.usermodel.ParagraphAlignment;
//import org.apache.Editeur_rapport_fichier_poi.xwpf.usermodel.UnderlinePatterns;   //import org.apache.Editeur_rapport_fichier_poi.xwpf.usermodel.XWPFDocument;
//import org.apache.Editeur_rapport_fichier_poi.xwpf.usermodel.XWPFParagraph;    //import org.apache.Editeur_rapport_fichier_poi.xwpf.usermodel.XWPFRun;

public class Editeur_rapport_fichier_poi {

public static void main(String[] args) {

try{

// un docuement contient des paragraphes ou des tableaux ,,, un paragraphe contient -> text et image
    
XWPFDocument doc= new XWPFDocument(); /*creer un document*/  XWPFParagraph p=doc.createParagraph(); //creer un paragraphe

XWPFRun r=p.createRun();  //la méthode run pr executer les commandes dans le fichier

r.setText(" je suis un étudiant en deuxieme année dans l'université de blida ");
    
r.setFontSize(24); r.setBold(true); r.setItalic(true); r.setUnderline(UnderlinePatterns.SINGLE);  r.setFontFamily("Tempus Sans ITC");

p.setAlignment(ParagraphAlignment.RIGHT);
p.setBorderTop(Borders.BIRDS); p.setBorderBottom(Borders.BIRDS);  p.setBorderLeft(Borders.BIRDS);  p.setBorderRight(Borders.BIRDS);
    
r.addBreak(); // saute de ligne
     
XWPFRun r2=p.createRun();  r2.setText("c'est simple je m'appelle amine ");
    
r.addPicture(new FileInputStream("/home/zed/Desktop/2.jpg"),XWPFDocument.PICTURE_TYPE_JPEG,"2.jpg",Units.toEMU(300),Units.toEMU(300));
    
// chemin vers un nv input de la photo,type,nom,x,y
    
    File f=new File("/home/zed/Desktop/amine.docx");
    FileOutputStream fos=new FileOutputStream(f);  
    //output -> il creer un fichier et il ecrit dedans tant que input on le donner le fichier a lire et a modifier
    doc.write(fos); 
    fos.close();    

    
   // --------------------------------------------------------------
    
    
    File f2=new File("/home/zed/Desktop/amine.docx");
    FileInputStream fis=new FileInputStream(f2);
    XWPFDocument xw=new XWPFDocument(fis); 

    XWPFWordExtractor xx=new XWPFWordExtractor(xw);  //extraire les donnes du fichiers

    System.out.println(xx.getText());
    
    
}catch(Exception e){ }



    }
    
}

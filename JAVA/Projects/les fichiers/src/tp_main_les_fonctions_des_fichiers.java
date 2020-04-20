import java.io.*;  //la bibliotheque des fichiers

import javax.swing.JOptionPane;

public class tp_main_les_fonctions_des_fichiers {

public static void main (String [] args){
    
    try {
        
      File s= new File ("/home/amine/Desktop/basbasa.docx");
     System.out.println(s.getName()+"\n");        //return le nom du fichier s'il existe 
     System.out.println(s.getPath()+"\n");  //retourn le chemin du fichier
     System.out.println(s.isDirectory()+"\n");  // teste si il est un dossier ou non
     System.out.println(s.isFile()+"\n");  //teste sil est un fichier ou non
     System.out.println(s.exists()+"\n"); //teste sil existe ou non
     System.out.println(s.length()+"\n"); // calcule la taille de ce fichier

    }
    
    catch(Exception e) {  //s'il ya une erreur dans try alors il vas directement vers catch 
      
        JOptionPane.showMessageDialog(null,"ya une erreur","Information",JOptionPane.ERROR_MESSAGE);
       
   }
  try{
      
     //  1/creation du fichier
    
     File f=new File("/home/amine/Desktop/amine.docx"); 
     
//  f=new File("/home/amine/Desktop/"+l1.getText()+".docx"); //le nom du fichier ces ce que lutilis tape

     f.createNewFile();       //Créer un ficier dans le chemin f avec le nom amine.docx
            
    
     
     
     
     
     
    //  2/ecrire dans un fichier
    
    FileWriter fw=new FileWriter(f,true);       //prepare comment ecrire dans le fichier quand on met true alors il fais un append dans linterface quand on met rien ou bien on met un false il met un setText dans linterface    
    PrintWriter pw=new PrintWriter(fw);         //prepare le fichier a ecire dedans
    pw.write("coucou cest moi amine \n ");         //Ecrire
    pw.close();                     //fermer le flux il faut tjr le fermer pr le liberer
            
    

    
    
// 3/ lire et afficher le fichier 
    
 FileReader   fr=new FileReader(f);             // preparer le flux du fichier 
 BufferedReader bf=new BufferedReader(fr);      //preparer le fichier a etre lue
 
 String l=bf.readLine();                        //cest une fonction qui retourne la 1er line 
    
    while( l!=null ) {                          //tant que le fichier nest pas vide faire
        System.out.println(l+"\n");
        l=bf.readLine();                        // retourne les autres lignes
   }
   } catch (Exception e){ 
           
           }

   
   try{ 
    
       //   4/ lire un fichiers avec split 
       
 FileReader r=new FileReader("/home/amine/Desktop/fac.txt");
 BufferedReader b=new BufferedReader(r);
 
 String q=b.readLine(),t[]=q.split("#");         //split fais la distingtion des mots ou bien des nombres ou bien ay haja 
                                                 //quand on as un fichier de type comme ca par expl amine#hammou#kacem#1234#qds12      
                                                 //alors elle retourne ca amine hammou kacem etc.. par ligne dans un tableaux
       for (int i = 0; i <t.length; i++) {
           System.out.println(t[i]);
       }

   } catch(Exception e) {}
   
   
}}

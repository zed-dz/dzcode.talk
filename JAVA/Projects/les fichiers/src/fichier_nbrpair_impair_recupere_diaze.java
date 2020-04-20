import java.io.*;

public class fichier_nbrpair_impair_recupere_diaze extends javax.swing.JFrame {

      FileReader fr; BufferedReader bf; 
        File f;
        
    public fichier_nbrpair_impair_recupere_diaze() {
        initComponents();
    }
    public String aff(String t){
        String im="",p="";
        for (int i = 0; i <t.length(); i++) {
            int a=Integer.parseInt(t.substring(i,i+1));
            if(a%2==0){
                p+=a;
            }else{ 
                im+=a;                
            }
        }
        return (t+" ces paires "+p+" et ces impaires "+im);        
    }
    
 
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        b1 = new javax.swing.JButton();
        jScrollPane1 = new javax.swing.JScrollPane();
        t1 = new javax.swing.JTextArea();
        jButton1 = new javax.swing.JButton();
        jButton2 = new javax.swing.JButton();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        b1.setText("1er methode");
        b1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                b1ActionPerformed(evt);
            }
        });

        t1.setColumns(20);
        t1.setRows(5);
        jScrollPane1.setViewportView(t1);

        jButton1.setText("2eme methode");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        jButton2.setText("3eme");
        jButton2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton2ActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addGap(28, 28, 28)
                .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 591, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 31, Short.MAX_VALUE)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(b1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 115, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButton1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButton2, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.PREFERRED_SIZE, 101, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(69, 69, 69))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addGap(77, 77, 77)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(b1, javax.swing.GroupLayout.PREFERRED_SIZE, 61, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(61, 61, 61)
                        .addComponent(jButton1, javax.swing.GroupLayout.PREFERRED_SIZE, 49, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(40, 40, 40)
                        .addComponent(jButton2, javax.swing.GroupLayout.PREFERRED_SIZE, 49, javax.swing.GroupLayout.PREFERRED_SIZE))
                    .addComponent(jScrollPane1, javax.swing.GroupLayout.PREFERRED_SIZE, 294, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(66, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void b1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_b1ActionPerformed

        try{
            
         int a;  String k="",s="";
       f = new File("/home/amine/Desktop/exo1.txt");
       fr= new FileReader(f);
       bf= new BufferedReader(fr);
                     String l=bf.readLine();                                  
                     String t []=l.split("#");
                      
                    for (int  j = 0; j <t.length; j++) {  //1234#5445#66668#2223#                                       
                            
                   for (int i = 0; i <t[j].length(); i++) {                      //1 2 3 4, //5 4 4 5                                  
                 
                       a=Integer.parseInt(t[j].substring(i,i+1));       //ils sont des entiers donc on les convert puis on fais un substring bl wahda c.a.d 1 a 2 omb3d mn 2 a 3 w hiya rayha w tcomparer                            
                        if(a%2==0  ){                                                                               
                    s+=a; 
                }else{    
                    k+=a; 
                  }     
                   }
                   t1.append(" voici le nombre "+j+" "+t[j]+" ces paires sont "+s+" ces impaires sont "+k+" \n");   
                   s="";k="";
                    }

        }catch(Exception e){}
        

    }//GEN-LAST:event_b1ActionPerformed

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed

                try{

   f = new File("/home/amine/Desktop/exo1.txt");
   fr=new FileReader(f);
   bf= new BufferedReader(fr);
                     String l=bf.readLine();                                  
                     String t []=l.split("#");
                    for (int i = 0; i <t.length; i++) {
                        t1.append(" le nombre est "+i+" : "+aff(t[i])+"\n"   );
                    }
                     
                     
                             }catch(Exception e){}

                     
    }//GEN-LAST:event_jButton1ActionPerformed

    private void jButton2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton2ActionPerformed
pair_impair_2 s=new pair_impair_2();
this.dispose();
s.setVisible(true);

/*
public class pair_impair_2 extends javax.swing.JFrame {

    File f;
 BufferedReader bf;
 FileReader fr;
 String [] t;
 String msg;
    public pair_impair_2() {       
        initComponents();
        
        afficher();   //on utilise directement les methode dans notre interface on lappelant ici 
        resultat();
        
    }

    
    public void afficher(){
        
        try{
            f=new File("/home/amine/Desktop/exo1.txt");
            fr=new FileReader(f);
            bf=new BufferedReader(fr);
            msg=bf.readLine();
                                                
        }catch(Exception e){
            
        }
        
                       
    }
    public void diviser(String x){
        String p="",im="";
        for (int i = 0; i <x.length(); i++) {
         
            if((int)(x.charAt(i))%2==0){
                p+=x.charAt(i);
            }else{
                im+=x.charAt(i);
            }                        
        }
        if(p.equals("")){
            p="0";
        }
        if(im.equals("")){
            im="0";
        }
        t1.append(x+"-->paire "+p+",impaire= "+im+"\n");
    }
    public void resultat(){
        
        t=msg.split("#");
        for (int i = 0; i <t.length; i++) {
            diviser(t[i]);
        }
    }
*/
    }//GEN-LAST:event_jButton2ActionPerformed

    public static void main(String args[]) {
        
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(fichier_nbrpair_impair_recupere_diaze.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(fichier_nbrpair_impair_recupere_diaze.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(fichier_nbrpair_impair_recupere_diaze.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(fichier_nbrpair_impair_recupere_diaze.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new fichier_nbrpair_impair_recupere_diaze().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton b1;
    private javax.swing.JButton jButton1;
    private javax.swing.JButton jButton2;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JTextArea t1;
    // End of variables declaration//GEN-END:variables
}

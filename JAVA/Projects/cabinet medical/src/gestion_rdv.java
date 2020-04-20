import java.sql.*;
import java.text.SimpleDateFormat;
import java.util.Date;
import javax.swing.JOptionPane;
import javax.swing.table.DefaultTableModel;

import java.io.*;import org.apache.poi.POITextExtractor;    
import org.apache.poi.extractor.ExtractorFactory;
import static org.apache.poi.hssf.usermodel.HeaderFooter.file;
import org.apache.poi.poifs.filesystem.POIFSFileSystem;
     import org.apache.poi.util.Units;     import org.apache.poi.xwpf.usermodel.*;    
import org.apache.poi.xwpf.extractor.XWPFWordExtractor;

public class gestion_rdv extends javax.swing.JFrame {
 
ConnecterBDD on = new ConnecterBDD();
Statement st; 
ResultSet rs;    
DefaultTableModel model = new DefaultTableModel();

java.util.Date date;
java.sql.Date sqldate;

 int i = 0;

    File f;
    
    FileWriter fw;
    PrintWriter pw;
    
    FileReader fr;
  BufferedReader bf;
  
public gestion_rdv() {  

        initComponents();

    try{

f = new File("/home/zed/Desktop/vu.txt");    fr=new FileReader(f);   bf=new BufferedReader(fr);       String k = bf.readLine();
   int y = Integer.parseInt(k);          y = y+1;       String q = Integer.toString(y);
    fw=new FileWriter(f,false);   //true cest a dire on ecrire avec append sinon false ou rien cest ecire avec setText
    pw=new PrintWriter(fw);    
    pw.write(q); 
    pw.close ();
    while(k!=null) {    vue.setText(k);   k=bf.readLine();              }    
          
}catch(Exception e){ }


//---------------
 
        model.addColumn("client_id");
        model.addColumn("nom_client");
        model.addColumn("date_rdv");
        model.addColumn("heure_rdv");
        model.addColumn("prix_rdv");


Date act = new Date();
SimpleDateFormat d = new SimpleDateFormat("yyyy-MM-dd");    SimpleDateFormat d2 = new SimpleDateFormat("hh:mm:ss");
lab.setText(d.format(act));      lab2.setText(d2.format(act));

try {

st = on.ObtenirConnexion().createStatement();
rs = st.executeQuery("select * from rendez_vous");
        
while (rs.next()){
    model.addRow(new Object[]{
        rs.getString(1),
        rs.getString("nomc"),
        rs.getString("daterdv"),
        rs.getString("heurerdv"),
        rs.getString("prixrdv")
    });
}
}catch(Exception e){
    JOptionPane.showMessageDialog(null,"erreur cnx");
}        

tab1.setModel(model);
   

}
    
public void refresh(){
    
try {

rs = st.executeQuery("select * from rendez_vous");

while (rs.next()){
    model.addRow(new Object[]{
        rs.getString(1),
        rs.getString("nomc"),
        rs.getString("daterdv"),
        rs.getString("heurerdv"),
        rs.getString("prixrdv")
    });
}
}catch(Exception e){
    JOptionPane.showMessageDialog(null,"erreur cnx");
}        
tab1.setModel(model);    

    //------------------------------------------

                   
                   
}
  
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jScrollPane2 = new javax.swing.JScrollPane();
        t5 = new javax.swing.JTextArea();
        b1 = new javax.swing.JButton();
        b2 = new javax.swing.JButton();
        b3 = new javax.swing.JButton();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        t1 = new javax.swing.JTextField();
        t4 = new javax.swing.JTextField();
        jLabel8 = new javax.swing.JLabel();
        b4 = new javax.swing.JButton();
        actuelle = new javax.swing.JLabel();
        jScrollPane1 = new javax.swing.JScrollPane();
        tab1 = new javax.swing.JTable();
        Date = new com.toedter.calendar.JDateChooser();
        lab = new javax.swing.JLabel();
        lab2 = new javax.swing.JLabel();
        actuelle1 = new javax.swing.JLabel();
        t3 = new javax.swing.JTextField();
        jLabel5 = new javax.swing.JLabel();
        t2 = new javax.swing.JTextField();
        jLabel6 = new javax.swing.JLabel();
        jLabel7 = new javax.swing.JLabel();
        jLabel9 = new javax.swing.JLabel();
        vue = new javax.swing.JLabel();
        vue1 = new javax.swing.JLabel();
        jMenuBar1 = new javax.swing.JMenuBar();
        jMenu1 = new javax.swing.JMenu();
        jMenuItem1 = new javax.swing.JMenuItem();
        jMenuItem2 = new javax.swing.JMenuItem();
        jMenu2 = new javax.swing.JMenu();
        jMenuItem4 = new javax.swing.JMenuItem();
        jMenu3 = new javax.swing.JMenu();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        t5.setColumns(20);
        t5.setRows(5);
        jScrollPane2.setViewportView(t5);

        b1.setIcon(new javax.swing.ImageIcon("/home/zed/Desktop/omar/images/4.png")); // NOI18N
        b1.setText("modifier");
        b1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                b1ActionPerformed(evt);
            }
        });

        b2.setIcon(new javax.swing.ImageIcon("/home/zed/Desktop/omar/images/3.png")); // NOI18N
        b2.setText("Ajouter");
        b2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                b2ActionPerformed(evt);
            }
        });

        b3.setIcon(new javax.swing.ImageIcon("/home/zed/Desktop/omar/images/5.png")); // NOI18N
        b3.setText("Supprimer");
        b3.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                b3ActionPerformed(evt);
            }
        });

        jLabel2.setText("nom_client");

        jLabel3.setText("date_rdv");

        jLabel4.setText("heure_rdv");

        jLabel8.setText("prix");

        b4.setText("Recherche");
        b4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                b4ActionPerformed(evt);
            }
        });

        actuelle.setText("Date :");

        tab1.setModel(new javax.swing.table.DefaultTableModel(
            new Object [][] {
                {null, null, null, null, null},
                {null, null, null, null, null},
                {null, null, null, null, null},
                {null, null, null, null, null}
            },
            new String [] {
                "client_id", "nom_client", "date_rdv", "heure_rdv", "prix_rdv"
            }
        ));
        tab1.addMouseListener(new java.awt.event.MouseAdapter() {
            public void mouseClicked(java.awt.event.MouseEvent evt) {
                tab1MouseClicked(evt);
            }
        });
        jScrollPane1.setViewportView(tab1);

        actuelle1.setText("Time : ");

        jLabel5.setText("client_id");

        jLabel6.setText("ajoutter :");

        jLabel7.setText("modifier :");

        jLabel9.setText("supprimer :");

        vue1.setText("Le nombre de vue est    : ");

        jMenu1.setText("File");

        jMenuItem1.setAccelerator(javax.swing.KeyStroke.getKeyStroke(java.awt.event.KeyEvent.VK_H, java.awt.event.InputEvent.ALT_MASK | java.awt.event.InputEvent.SHIFT_MASK | java.awt.event.InputEvent.CTRL_MASK));
        jMenuItem1.setText("ouvire");
        jMenuItem1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jMenuItem1ActionPerformed(evt);
            }
        });
        jMenu1.add(jMenuItem1);

        jMenuItem2.setAccelerator(javax.swing.KeyStroke.getKeyStroke(java.awt.event.KeyEvent.VK_I, java.awt.event.InputEvent.ALT_MASK | java.awt.event.InputEvent.SHIFT_MASK | java.awt.event.InputEvent.CTRL_MASK));
        jMenuItem2.setText("fermer");
        jMenuItem2.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jMenuItem2ActionPerformed(evt);
            }
        });
        jMenu1.add(jMenuItem2);

        jMenuBar1.add(jMenu1);

        jMenu2.setText("Edit");

        jMenuItem4.setAccelerator(javax.swing.KeyStroke.getKeyStroke(java.awt.event.KeyEvent.VK_P, java.awt.event.InputEvent.ALT_MASK | java.awt.event.InputEvent.SHIFT_MASK | java.awt.event.InputEvent.CTRL_MASK));
        jMenuItem4.setText("palett-menuitem");
        jMenuItem4.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jMenuItem4ActionPerformed(evt);
            }
        });
        jMenu2.add(jMenuItem4);

        jMenuBar1.add(jMenu2);

        jMenu3.setText("help");
        jMenuBar1.add(jMenu3);

        setJMenuBar(jMenuBar1);

        org.jdesktop.layout.GroupLayout layout = new org.jdesktop.layout.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
            .add(layout.createSequentialGroup()
                .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                    .add(layout.createSequentialGroup()
                        .add(44, 44, 44)
                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                            .add(layout.createSequentialGroup()
                                .add(jScrollPane2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 426, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                .add(28, 28, 28)
                                .add(b4, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 125, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                            .add(layout.createSequentialGroup()
                                .add(6, 6, 6)
                                .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                                    .add(layout.createSequentialGroup()
                                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.TRAILING, false)
                                            .add(layout.createSequentialGroup()
                                                .add(jLabel8, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 66, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                                .add(29, 29, 29)
                                                .add(t4, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 156, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                                            .add(layout.createSequentialGroup()
                                                .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.TRAILING)
                                                    .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                                                        .add(jLabel2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 77, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                                        .add(jLabel4))
                                                    .add(org.jdesktop.layout.GroupLayout.LEADING, jLabel3, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 62, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                                                .add(18, 18, 18)
                                                .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING, false)
                                                    .add(t1, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 156, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                                    .add(Date, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 156, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                                    .add(t3, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 156, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)))
                                            .add(layout.createSequentialGroup()
                                                .add(jLabel5, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 77, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                                .add(18, 18, 18)
                                                .add(t2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 156, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)))
                                        .add(80, 80, 80)
                                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                                            .add(org.jdesktop.layout.GroupLayout.TRAILING, layout.createSequentialGroup()
                                                .add(jLabel9, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 77, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                                .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                                                .add(b3, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 122, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                                            .add(org.jdesktop.layout.GroupLayout.TRAILING, layout.createSequentialGroup()
                                                .add(jLabel6, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 77, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                                .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                                                .add(b2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 122, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                                            .add(org.jdesktop.layout.GroupLayout.TRAILING, layout.createSequentialGroup()
                                                .add(jLabel7, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 77, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                                .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                                                .add(b1, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 122, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))))
                                    .add(jScrollPane1, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 536, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)))))
                    .add(layout.createSequentialGroup()
                        .add(13, 13, 13)
                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                            .add(layout.createSequentialGroup()
                                .add(vue1, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 160, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                                .add(vue, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 28, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                            .add(layout.createSequentialGroup()
                                .add(actuelle, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 114, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(org.jdesktop.layout.LayoutStyle.UNRELATED)
                                .add(lab, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 129, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                .add(49, 49, 49)
                                .add(actuelle1, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 114, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                                .addPreferredGap(org.jdesktop.layout.LayoutStyle.UNRELATED)
                                .add(lab2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 129, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)))))
                .addContainerGap(56, Short.MAX_VALUE))
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
            .add(layout.createSequentialGroup()
                .addContainerGap()
                .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                    .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                        .add(actuelle, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 36, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                        .add(lab, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 36, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                    .add(org.jdesktop.layout.GroupLayout.TRAILING, layout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                        .add(actuelle1, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 36, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                        .add(lab2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 36, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)))
                .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.TRAILING)
                    .add(jScrollPane2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 35, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                    .add(b4, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 47, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                .add(15, 15, 15)
                .add(jScrollPane1, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 147, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                .add(9, 9, 9)
                .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING)
                    .add(layout.createSequentialGroup()
                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                            .add(b2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 45, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                            .add(jLabel6, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 33, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                        .add(12, 12, 12)
                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                            .add(b1, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 47, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                            .add(jLabel7, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 33, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                        .add(18, 18, 18)
                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                            .add(b3, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 43, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                            .add(jLabel9, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 33, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)))
                    .add(layout.createSequentialGroup()
                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                            .add(jLabel2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 42, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                            .add(t1, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 42, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.LEADING, false)
                            .add(Date, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, org.jdesktop.layout.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .add(jLabel3, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 42, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                            .add(jLabel4, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 42, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                            .add(t3, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 42, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(org.jdesktop.layout.LayoutStyle.UNRELATED)
                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                            .add(jLabel8, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 42, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                            .add(t4, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 42, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                        .addPreferredGap(org.jdesktop.layout.LayoutStyle.RELATED)
                        .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                            .add(jLabel5, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 42, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                            .add(t2, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 42, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))))
                .add(35, 35, 35)
                .add(layout.createParallelGroup(org.jdesktop.layout.GroupLayout.BASELINE)
                    .add(vue1, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 33, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE)
                    .add(vue, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE, 33, org.jdesktop.layout.GroupLayout.PREFERRED_SIZE))
                .addContainerGap(83, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void b1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_b1ActionPerformed

     int p = Integer.parseInt(t4.getText());
     int id=Integer.parseInt(t2.getText());
     
        try{   

 String txt = t3.getText();

 Date time2 = null;
 time2 = new SimpleDateFormat("hh:mm:ss").parse(txt);
        
date = Date.getDate();
sqldate = new java.sql.Date(date.getTime());
             
st.executeUpdate("update rendez_vous set nomc='"+t1.getText()+"'"+",daterdv='"+sqldate+"' ,heurerdv='"+new Time(time2.getTime())+"' ,prixrdv="+p+" where clientid ="+id);
                   
JOptionPane.showMessageDialog(null,"vous avez bien modifier","Information modified",JOptionPane.INFORMATION_MESSAGE);

model.setRowCount(0);

refresh();
       
  }catch(Exception e){
   JOptionPane.showMessageDialog(null,e);
     }
t1.setText(""); t3.setText(""); t4.setText(""); t2.setText(""); 
    }//GEN-LAST:event_b1ActionPerformed

    private void b2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_b2ActionPerformed
    
int p = Integer.parseInt(t4.getText());

try{    

date = Date.getDate();
sqldate = new java.sql.Date(date.getTime());

String txt = t3.getText();

Date time2 = null;

time2 = new SimpleDateFormat("hh:mm:ss").parse(txt);
   
 PreparedStatement ps=on.ObtenirConnexion().prepareStatement("insert into rendez_vous (nomc,daterdv,heurerdv,prixrdv) values(?,?,?,?)");  
            ps.setString(1, t1.getText());
            ps.setDate(2, sqldate);
            ps.setTime(3, new Time(time2.getTime()));
            ps.setInt(4, p);
            ps.executeUpdate();            

//st.executeUpdate("insert into rendez_vous(nomc,daterdv,heurerdv,prixrdv)"+"values('"+t1.getText()+"','"+sqldate+"','"+new Time(date2.getTime())+"',"+p+")");

JOptionPane.showMessageDialog(null,"your date is successfully inserted ");

model.setRowCount(0);

refresh();

 }catch(Exception e){
        JOptionPane.showMessageDialog(null,e);
    }
        t1.setText("");    t3.setText("");   t4.setText("");  
    }//GEN-LAST:event_b2ActionPerformed

    private void b3ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_b3ActionPerformed
           
     int id=Integer.parseInt(t2.getText());
     
        try{   
           
st.executeUpdate("delete from rendez_vous where  clientid="+id);
                   
JOptionPane.showMessageDialog(null,"vous avez bien supprimer","Information deleted",JOptionPane.INFORMATION_MESSAGE);

model.setRowCount(0);

refresh();
       
  }catch(Exception e){
   JOptionPane.showMessageDialog(null,e);
     }
t2.setText(""); 
        
    }//GEN-LAST:event_b3ActionPerformed

    private void jMenuItem1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jMenuItem1ActionPerformed

        //cest le menu item ouvrir qui redirect vers une autre page
    }//GEN-LAST:event_jMenuItem1ActionPerformed

    private void jMenuItem2ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jMenuItem2ActionPerformed
        //cest le menu item fermer qui fermera linterface graphique
        this.dispose();
    }//GEN-LAST:event_jMenuItem2ActionPerformed

    private void jMenuItem4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jMenuItem4ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_jMenuItem4ActionPerformed

    private void b4ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_b4ActionPerformed
        // TODO add your handling code here:
    }//GEN-LAST:event_b4ActionPerformed

    private void tab1MouseClicked(java.awt.event.MouseEvent evt) {//GEN-FIRST:event_tab1MouseClicked
        t1.setText(""+model.getValueAt(tab1.getSelectedRow(), 0));
        t3.setText(""+model.getValueAt(tab1.getSelectedRow(), 2));
        t4.setText(""+model.getValueAt(tab1.getSelectedRow(), 3));
        t2.setText(""+model.getValueAt(tab1.getSelectedRow(), 4));
        
    }//GEN-LAST:event_tab1MouseClicked

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(gestion_rdv.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(gestion_rdv.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(gestion_rdv.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(gestion_rdv.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new gestion_rdv().setVisible(true);                

                
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private com.toedter.calendar.JDateChooser Date;
    private javax.swing.JLabel actuelle;
    private javax.swing.JLabel actuelle1;
    private javax.swing.JButton b1;
    private javax.swing.JButton b2;
    private javax.swing.JButton b3;
    private javax.swing.JButton b4;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jLabel6;
    private javax.swing.JLabel jLabel7;
    private javax.swing.JLabel jLabel8;
    private javax.swing.JLabel jLabel9;
    private javax.swing.JMenu jMenu1;
    private javax.swing.JMenu jMenu2;
    private javax.swing.JMenu jMenu3;
    private javax.swing.JMenuBar jMenuBar1;
    private javax.swing.JMenuItem jMenuItem1;
    private javax.swing.JMenuItem jMenuItem2;
    private javax.swing.JMenuItem jMenuItem4;
    private javax.swing.JScrollPane jScrollPane1;
    private javax.swing.JScrollPane jScrollPane2;
    private javax.swing.JLabel lab;
    private javax.swing.JLabel lab2;
    private javax.swing.JTextField t1;
    private javax.swing.JTextField t2;
    private javax.swing.JTextField t3;
    private javax.swing.JTextField t4;
    private javax.swing.JTextArea t5;
    private javax.swing.JTable tab1;
    private javax.swing.JLabel vue;
    private javax.swing.JLabel vue1;
    // End of variables declaration//GEN-END:variables
}

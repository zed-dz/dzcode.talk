package rapport_doc_poi_regex;

import java.io.*;
import org.apache.poi.xwpf.usermodel.*;
//import java.lang.*;

import org.apache.poi.xwpf.extractor.XWPFWordExtractor;
import org.apache.poi.util.Units;

public class exo1 {

  public static void main(String[] args) {
  
try{
/*    
XWPFDocument doc = new XWPFDocument();
XWPFParagraph p = doc.createParagraph();
XWPFRun r=p.createRun();
r.setText("hello world");
p.setBorderBetween(Borders.ZIG_ZAG_STITCH); p.setBorderLeft(Borders.BIRDS); p.setBorderTop(Borders.BABY_RATTLE); p.setBorderRight(Borders.BALLOONS_3_COLORS); p.setBorderBottom(Borders.BABY_PACIFIER);
r.addBreak();
r.setText("hey deep shit");



File f = new File("/home/zed/Desktop/tp.docx");
FileOutputStream fo = new FileOutputStream(f);
doc.write(fo);
fo.close();
*/

			XWPFDocument d = new XWPFDocument();
			File fileToBeCreated = new File("/home/zed/Desktop/Test.docx");
			FileOutputStream fifo = new FileOutputStream(fileToBeCreated);
 
			// create Paragraph
			XWPFParagraph paragraph1 = d.createParagraph();
			paragraph1.setBorderBottom(Borders.BASIC_THIN_LINES);
			paragraph1.setBorderLeft(Borders.BASIC_THIN_LINES);
			paragraph1.setBorderRight(Borders.BASIC_THIN_LINES);
			paragraph1.setBorderTop(Borders.BASIC_THIN_LINES);
 
			XWPFRun run = paragraph1.createRun();
			run.setText("We created a word file using Apache POI. " 
					+ "And now we are writing into it as a paragraph. "
					+ "Next, we will add some cool stuff to this Word document.");			
 
			d.write(fifo);
 
			System.out.println("Paragraph created and Border added in Word File Succefully !!!");
                                    
                        	d.close();
         			fifo.close();

}catch (Exception e) {
			System.out.println("We had an error while creating the Word Doc");
                            } 



}}

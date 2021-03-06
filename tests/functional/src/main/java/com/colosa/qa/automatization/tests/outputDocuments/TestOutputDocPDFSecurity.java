package com.colosa.qa.automatization.tests.outputDocuments;

import com.colosa.qa.automatization.common.Logger;
import org.junit.After;
import org.junit.Assert;
import org.junit.Test;

import java.io.FileNotFoundException;
import java.io.IOException;

public class TestOutputDocPDFSecurity extends com.colosa.qa.automatization.tests.common.Test{


    public TestOutputDocPDFSecurity(String browserName) throws IOException {
        super(browserName);
    }

    @Test
	public void testPDFSecurity() throws FileNotFoundException, IOException, Exception{

		pages.gotoDefaultUrl();
		pages.Login().loginUser("admin", "admin", "workflow", "English");
		pages.Main().goHome();
		pages.Home().gotoNewCase().startCase("Output documents - PDF security (PDF security)");
		pages.OutputDocProcess().downloadPdfFile();
		Logger.addLog(pages.OutputDocProcess().checkPdfSecurity("C:\\Users\\Administrator\\Downloads\\test_1.pdf", "test"));
		Assert.assertEquals(" \nTest PDF security.\nIf you can read this message, the file has been opened.\nPowered by TCPDF (www.tcpdf.org)", pages.OutputDocProcess().checkPdfSecurity("C:\\Users\\Administrator\\Downloads\\test_1.pdf","test"));

		pages.InputDocProcess().switchToDefault();
		pages.Main().logout();
	}

    @After
    public void cleanup(){
        browserInstance.quit();
    }


}
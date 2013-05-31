package com.colosa.qa.automatization;

import org.junit.AfterClass;
import org.junit.runner.RunWith;
import org.junit.runners.Suite;
import org.junit.runners.Suite.SuiteClasses;

@RunWith(value = Suite.class)
@SuiteClasses(value = { com.colosa.qa.automatization.tests.testsJavascript.TestJSGetRow.class,
                        com.colosa.qa.automatization.tests.testsJavascript.TestJSGetField.class})
public class testsJavascript {
    @AfterClass public static void tearDownClass() {
        //Browser.quit();
    }

}

const puppeteer = require('puppeteer');
const dotEnv = require('dotenv');
dotEnv.config();


(async () => {
  try {
    const browser = await puppeteer.launch({
      headless:false,
    });

    const page = await browser.newPage();

    await page.goto('https://kasboek.smartfms.nl/default.asp', {waitUntil: 'networkidle2'});

    await page.type('[name=strGebruikersnaam]', process.env.KASBOEK_USER);
    await page.type('[name=strWachtwoord]', process.env.KASBOEK_PASSWORD);
    await page.click('[alt=Inloggen]');

    await page.waitForSelector('[name=divPopup]')
      .then(async () => {
        page.evaluate(x => {
          return Promise.resolve(parent.fPopupCancel());
        });
      });

    await page.click('//*[@id="tblSubmenu_BR_BR"]/tbody/tr[3]/td/a');

    // await page.click('//*[@id="tdNavigatieTop"]/a[2]');

    // await browser.close();
  } catch (e) {
    console.log(e);
  }
})();
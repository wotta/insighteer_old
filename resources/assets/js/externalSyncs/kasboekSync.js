const puppeteer = require('puppeteer');
const dotEnv = require('dotenv');
dotEnv.config();


(async () => {
  try {
    const browser = await puppeteer.launch({
      headless:true,
      args: ['--no-sandbox']
    });

    const page = await browser.newPage();

    await page.goto('https://kasboek.smartfms.nl/default.asp', {waitUntil: 'networkidle2'});

    await page.type('[name=strGebruikersnaam]', process.env.KASBOEK_USER);
    await page.type('[name=strWachtwoord]', process.env.KASBOEK_PASSWORD);
    await page.click('[alt=Inloggen]');

    await page.waitForSelector('[name=divPopup]')
      .then(async () => {
        page.evaluate(x => {
            Promise.resolve(parent.fPopupCancel());
            Promise.resolve(collapseObject('divBeheerRekeningen', 'divBerichten,divSignaleringen,divEigenRekeningen'));
        });
      });

    await page.click('#tblSubmenu_BR_BR > tbody > tr:nth-child(2) > td > a');

    // await page.waitForSelector('form[name="frmTransactieInfoDatumSelectie"]')
    //   .then(async () => {
    //     page.evaluate((x) => {
    //       document.querySelector('input[id=FID]').value = 3;
    //       return Promise.resolve(postTransactieInfoDatumSelectie());
    //     });
    //   });
    //
    // await page.waitForSelector('.panelcontent');

    await page.waitForSelector('.panel');

    const data = await page.evaluate(() => {
        const elements = Array.from(document.querySelectorAll('[id^="divOverzichtSaldo"]'));

        return elements.map(e => {
            const data = {};

            data.paymentDate = e.querySelector('div:nth-child(1)').innerText.trim();
            data.amount = e.querySelector('div:nth-child(4)').innerText.trim();

            if (! data.amount) {
              data.amount = e.querySelector('div:nth-child(5)').innerText.trim();
            }

            const parent = e.querySelector('div:nth-child(2)');
            const strong = parent.querySelector('strong');

            data.company = '';

            if (strong) {
                data.company = strong.innerText.trim();
                parent.removeChild(strong);
            }

            data.description = parent.innerText.trim();

            return data;
        });
    });

    console.log(JSON.stringify(data));

    await browser.close();
  } catch (e) {
    console.log(e);
  }
})();

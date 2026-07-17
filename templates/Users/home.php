<style>
    .welcome-container {

        min-height: 85vh;
        display: flex;
        justify-content: center;
        align-items: center;

        padding: 40px 20px;

    }


    .welcome-box {

        width: 100%;
        max-width: 700px;

        background: #ffffff;

        padding: 45px 40px;

        border-radius: 20px;

        text-align: center;

        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);

    }


    .welcome-icon {

        width: 80px;
        height: 80px;

        margin: 0 auto 20px;

        display: flex;
        justify-content: center;
        align-items: center;

        background: #e8f5ee;

        color: #006633;

        border-radius: 50%;

        font-size: 35px;

    }


    .welcome-box h1 {

        font-size: 32px;

        font-weight: 700;

        color: #006633;

        margin-bottom: 15px;

    }


    .welcome-message {

        font-size: 17px;

        color: #555;

        margin-bottom: 35px;

    }


    .welcome-features {

        display: grid;

        grid-template-columns: repeat(2, 1fr);

        gap: 20px;

        margin-top: 30px;

    }


    .feature-item {

        background: #006633;

        color: white;

        padding: 25px;

        border-radius: 15px;

        display: flex;

        align-items: center;

        gap: 15px;

        text-align: left;

    }


    .feature-icon {

        width: 55px;
        height: 55px;

        min-width: 55px;

        display: flex;

        justify-content: center;
        align-items: center;

        background: rgba(255, 255, 255, 0.15);

        border-radius: 50%;

        font-size: 25px;

    }


    .feature-item p {

        margin: 0;

        color: white;

        font-size: 14px;

        line-height: 1.6;

    }


    .feature-item strong {

        color: white;

    }


    @media(max-width:768px) {

        .welcome-features {

            grid-template-columns: 1fr;

        }

    }
</style>

<div class="welcome-container">

    <div class="welcome-box">

        <div class="welcome-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>

        <h1>
            Welcome,
            <?= isset($auth['first_name'], $auth['last_name'])
                ? h($auth['first_name'] . ' ' . $auth['last_name'])
                : 'Student' ?>!
        </h1>

        <p class="welcome-message">
            We're glad to have you here.
        </p>

        <div class="welcome-features">

            <div class="feature-item">

                <div class="feature-icon">
                    <i class="bi bi-search"></i>
                </div>

                <p>
                    Explore available scholarship opportunities offered by
                    <strong>
                        Holy Trinity College of General Santos City
                    </strong>.
                </p>

            </div>


            <div class="feature-item">

                <div class="feature-icon">
                    <i class="bi bi-file-earmark-check"></i>
                </div>

                <p>
                    Submit requirements and monitor your scholarship
                    application status through the portal.
                </p>

            </div>

        </div>

    </div>

</div>
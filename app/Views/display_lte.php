<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="shortcut icon" type="image/jpg" href="<?= base_url('public/uploads/aplikasi/' . $app->logo) ?>" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url() ?>public/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!-- <link href="https://vjs.zencdn.net/8.6.1/video-js.css" rel="stylesheet" /> -->
    <link rel="stylesheet" href="<?= base_url() ?>public/plugins/plyr/plyr.css">
    <script src="<?= base_url() ?>public/plugins/plyr/plyr.js"></script>
</head>

<body class="hold-transition layout-top-nav layout-footer-fixed" style="height: auto;">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light bg-olive">
            <div class="container-fluid" style="height: 85px;">
                <a href="<?= base_url() ?>index3.html" class="navbar-brand">
                    <img src="<?= base_url('public/uploads/aplikasi/' . $app->logo) ?>" style="height: 40px;" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
                    <span class="h3 brand-text text-white"><?= "$app->nama_pt" ?></span>
                </a>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <h3><?= strtoupper(date_indo(date('Y-m-d'))) ?></h3>
                        <h4 id="jam" style="font-size: 16;"></h4>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="content-wrapper">
            <div class="container-fluid px-2 pt-2">
                <div class="row mb-0 px-1">
                    <div class="col-md-7">
                        <div class="card pt-0">
                            <div class="card-body px-1 py-1 mx-auto">
                                <!-- <video id="my-video" class="video-js" width="850" height="500" data-setup="{}">
                                    <source src="public/videos/hasanah.mp4" type="video/mp4" />
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
                                    </p>
                                </video> -->
                                <div class="media">
                                    <div class="loader-ring"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header text-center pb-1 text-bold" style="font-weight: 1000;">
                                <h1 class="animate__animated animate__fadeInRight">ESTIMASI BAGI HASIL</h1>
                            </div>
                            <div class="card-body px-1 py-1">
                                <table class="table table-bordered table-hover table-striped" style="width:100%;font-size: 20px;">
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="vertical-align: middle; text-align:center;">Produk Dana</th>
                                            <th colspan="2" style="text-align: center;">Nisbah</th>
                                            <th rowspan="2" style="vertical-align: middle;text-align:center;">Equivalent <br> Rate</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center">Bank</th>
                                            <th class="text-center">Nasabah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($baghas) > 0) : ?>
                                            <?php foreach ($baghas as $key => $bs) : ?>
                                                <tr>
                                                    <td><?= $bs->produk ?></td>
                                                    <td class="text-center"><?= round($bs->nisbah_bank, 0) ?> %</td>
                                                    <td class="text-center"><?= round($bs->nisbah_nsb, 0) ?> %</td>
                                                    <td class="text-center"><?= $bs->eq_rate ?> %</td>
                                                </tr>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer pb-1">
                                <h5 class="text-info text-bold">Update terakhir pada : <?= date_indo($baghas[0]->periode) ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row px-1">
                    <?php if ($jadwalSholat) : ?>
                        <?php foreach ($waktu as $key => $wk) : ?>
                            <div class="col-md-2 my-0">
                                <div class="card <?= $wk['warna'] ?> color-palette text-center animate__animated animate__fadeInLeft">
                                    <div class="card-header pb-1">
                                        <h3><?= strtoupper($wk['sholat']) ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <h3>
                                            <?= date("H:i", strtotime($wk['waktu'])) ?> WIB</h3>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        <footer class="main-footer text-center bg-olive">
            <strong><?= $app->nama_pt ?></strong> - All Right Reserved.
        </footer>
    </div>
    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url() ?>public/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url() ?>public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url() ?>public/js/adminlte.min.js"></script>
    <!-- <script src="https://vjs.zencdn.net/8.6.1/video.min.js"></script> -->
    <script type="text/javascript">
        window.onload = function() {
            jam();
        }

        function jam() {
            var e = document.getElementById('jam'),
                d = new Date(),
                h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());
            e.innerHTML = h + ':' + m + ':' + s + ' WIB';
            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }

        var base_url = "<?= base_url() ?>";
    </script>
    <?php
    $path = 'public/videos/';
    $files = scandir($path);
    foreach ($files as $file) {
        if ($file == '.' || $file == '..') {
            continue;
        }
        if (is_dir($path . $file)) {
            continue;
        }

        $mime = mime_content_type($path . $file);

        if ($mime == 'video/mp4') {
            $videos[] = base_url() . '/' . $path . $file;
        }
    }
    echo '<script type="text/javascript">';
    echo 'const list_videos = ' . "'" .  json_encode($videos) . "'";
    echo '</script>';
    ?>
    <script>
        $media_container = $('.media');
        w = $media_container.outerWidth();
        h = $media_container.outerHeight();

        function playVideo() {
            const data_videos = JSON.parse(list_videos);
            console.log(data_videos);
            const controls = `
		<div class="plyr__controls">
			${ data_videos.length > 1 ?
			`<button class="plyr__controls__item plyr__control" type="button" id="prev-video" aria-label="Prev Video">
				<svg class="icon--not-pressed" aria-hidden="true" focusable="false">
					<use xlink:href="${base_url}public/vendors/font-awesome/sprites/solid.svg#step-backward"></use>
				</svg>
					<span class="plyr__tooltip" role="tooltip">Prev Video</span>
			</button>` : ``
			}
			<button class="plyr__controls__item plyr__control" type="button" data-plyr="play" aria-label="Play">
				<svg class="icon--pressed" aria-hidden="true" focusable="false">
					<use xlink:href="#plyr-pause"></use>
				</svg>
				<svg class="icon--not-pressed" aria-hidden="true" focusable="false">
					<use xlink:href="#plyr-play"></use>
				</svg>
					<span class="label--pressed plyr__sr-only">Pause</span>
					<span class="label--not-pressed plyr__sr-only">Play</span>
			</button>
			${ data_videos.length > 1 ?
			`<button class="plyr__controls__item plyr__control" type="button" id="next-video" aria-label="Next Video">
				<svg class="icon--not-pressed" aria-hidden="true" focusable="false">
					<use xlink:href="${base_url}public/vendors/font-awesome/sprites/solid.svg#step-forward"></use>
				</svg>
					<span class="plyr__tooltip" role="tooltip">Next Video</span>
			</button>` : ``}
			<div class="plyr__controls__item plyr__progress__container">
			<div class="plyr__progress">
				<input data-plyr="seek" type="range" min="0" max="100" step="0.01" value="0" autocomplete="off" role="slider" aria-label="Seek" aria-valuemin="0" aria-valuemax="183.126" aria-valuenow="0" id="plyr-seek-2924" aria-valuetext="00:00 of 03:03" style="--value:0%;">
				<progress class="plyr__progress__buffer" min="0" max="100" value="0" role="progressbar" aria-hidden="true">% buffered</progress>
				<span class="plyr__tooltip">00:00</span>
			</div>
			</div>
			<div class="plyr__controls__item plyr__time--current plyr__time" aria-label="Current time">03:03</div>
			<div class="plyr__controls__item plyr__volume">
				<button type="button" class="plyr__control" data-plyr="mute">
					<svg class="icon--pressed" aria-hidden="true" focusable="false">
					<use xlink:href="#plyr-muted"></use>
					</svg>
					<svg class="icon--not-pressed" aria-hidden="true" focusable="false">
						<use xlink:href="#plyr-volume"></use>
					</svg>
					<span class="label--pressed plyr__sr-only">Unmute</span>
					<span class="label--not-pressed plyr__sr-only">Mute</span>
				</button>
				<input data-plyr="volume" type="range" min="0" max="1" step="0.05" value="1" autocomplete="off" role="slider" aria-label="Volume" aria-valuemin="0" aria-valuemax="100" aria-valuenow="45" id="plyr-volume-2924" aria-valuetext="45.0%" style="--value:45%;">
			</div>
		</div>`;


            $video = $('<video controls crossorigin playsinline>');
            $video.attr({
                'width': w,
                'height': h
            });
            $('.loader-ring').remove();
            $video.appendTo($('.media').height(h));
            $('.current-antrian-container').height(h);
            $source = $('<source>').appendTo($video);
            $source.attr('src', "");
            const player = new Plyr($video[0], {
                controls
            });

            let urut = 0;

            player.source = {
                type: 'video',
                title: 'Example title',
                sources: [{
                    src: data_videos[urut],
                    type: "video/mp4",
                }]
            };

            player.on('ended', function(event) {

                urut = urut + 1;
                if (urut == data_videos.length) {
                    urut = 0;
                }
                player.source = {
                    type: 'video',
                    title: 'Example title',
                    sources: [{
                        src: data_videos[urut],
                        type: "video/mp4",
                    }]
                };

                player.play();

            })

            $(document).delegate('#next-video', 'click', function() {
                urut = urut + 1;
                if (urut == data_videos.length) {
                    urut = 0;
                }

                player.source = {
                    type: 'video',
                    title: 'Example title',
                    sources: [{
                        src: data_videos[urut],
                        type: "video/mp4",
                    }]
                };

                player.play();
            })

            $(document).delegate('#prev-video', 'click', function() {
                if (urut == 0) {
                    urut = data_videos.length - 1;
                } else {
                    urut = urut - 1;

                }

                player.source = {
                    type: 'video',
                    title: 'Example title',
                    sources: [{
                        src: data_videos[urut],
                        type: "video/mp4",
                    }]
                };

                player.play();
            })

            // player.play();
        }
        playVideo();
    </script>
</body>

</html>
<template>
    <div class="twitch-panel d-none d-sm-block">
        <div class="row mb-5">
            <div class="col">

                <div class="card">
                    <div class="card-body">
                        <div class="twitch-panel__avatars" v-if="streamers.length > 1">
                            <ul>
                                <li @click.stop.prevent="switchStreamer(streamer)" v-for="streamer in streamers" :class="{'is-active':(streamer.id == streamer_selected.id)}">
                                    <img :src="streamer.twitch_profile_image_url">
                                </li>
                            </ul>
                        </div>
                        <div class="twitch-panel__inner" v-if="streamer_selected.id">
                            <div class="twitch-panel__head">
                                <a class="twitch-panel__head-link" target="_blank" :href="streamer_selected.twitch_url">
                                    <img v-if="streamers.length == 1" :src="streamer_selected.twitch_profile_image_url" class="twitch-panel__head-image"/>
                                    <span class="twitch-panel__head-name">
                                        {{streamer_selected.twitch_displayname}} is <span>streaming now</span>
                                    </span>
                                </a>
                            </div>
                            <div class="twitch-panel__iframe">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe
                                            :src="iframe_url"
                                            class="embed-responsive-item"
                                            height="400"
                                            width="300"
                                            frameborder="0"
                                            scrolling="no"
                                            allowfullscreen="true">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        streamers: {
            default: []
        }
    },
    data() {
        return {
            streamer_selected: {}
        };
    },
    mounted() {
        console.log("this is the panel");
        console.log(this.streamers);
        this.streamer_selected = this.streamers[0];
    },
    computed: {
        iframe_url() {
            return `https://player.twitch.tv/?channel=${
                this.streamer_selected.twitch_username
            }&muted=true&autoplay=true`;
        }
    },
    methods: {
        switchStreamer(streamer) {
            this.streamer_selected = streamer;
        }
    }
};
</script>

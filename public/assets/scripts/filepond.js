FilePond.registerPlugin(
  FilePondPluginImagePreview,
  FilePondPluginImageCrop,
  FilePondPluginImageExifOrientation,
  FilePondPluginImageFilter,
  FilePondPluginImageResize,
  FilePondPluginFileValidateSize,
  FilePondPluginFileValidateType,
)

// Konfigurasi FilePond
const filePondConfig = {
  credits: null,
  allowImagePreview: false,
  allowMultiple: false,
  allowFileEncode: false,
  required: false,
  storeAsFile: true,
};

// Menerapkan konfigurasi untuk setiap elemen
const fileInputs = [
  "#sk_berkala",
  "#sk_pangkat",
  "#skp",
  "#pengantar_kepsek",
  '#sk'
];

// Filepond: Basic
fileInputs.forEach((input) => {
  FilePond.create(document.querySelector(input), filePondConfig);
});